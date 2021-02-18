<?php

namespace ExampleCMS\Application\Middleware\Web;

use Psr\Http\{
    Message\ServerRequestInterface,
    Message\ResponseInterface,
    Server\RequestHandlerInterface,
    Server\MiddlewareInterface
};
use ExampleCMS\Contract\Renderer;
use ExampleCMS\Contract\Responder;

class FrontController implements MiddlewareInterface
{

    /**
     * @var \ExampleCMS\Contract\Factory\Action 
     */
    public $actionFactory;

    /**
     * @var \ExampleCMS\Contract\Factory\Module
     */
    public $moduleFactory;

    /**
     * @var \ExampleCMS\Contract\Factory\Responder
     */
    public $responderFactory;

    /**
     * @var \ExampleCMS\Contract\Factory\Renderer
     */
    public $rendererFactory;

    /**
     * @var \ExampleCMS\Contract\Config 
     */
    public $config;

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = $handler->handle($request);

        // module

        $moduleName = $request->getAttribute('module');

        if (empty($moduleName)) {
            throw new \ExampleCMS\Exception\Http\NotFound;
        }

        $module = $this->moduleFactory->get($moduleName);

        // context helpers

        /* @var $context \ExampleCMS\Contract\Context */
        $context = $request->getAttribute('context')->withAttributes([
            'forms' => function () use ($request) {
                return $request->getParsedBody();
            },
            'examplecms_timestart' => function () use ($request) {
                return $request->getAttribute('examplecms_timestart');
            }
        ]);

        // actions

        foreach ($request->getAttribute('actions', []) as $action) {
            $context = $this->actionFactory->get($action, $module)->execute($context);
        }

        // session

        $session = $request->getAttribute('session');

        foreach ($request->getAttribute('context-to-session', []) as $contextAttribute => $sessionAttribute) {
            $session->set($sessionAttribute, $context->getAttribute($contextAttribute));
        }

        // redirect

        $location = $context->getAttribute('location');

        if ($location) {
            return $response->withHeader('Location', $request->getAttribute('router')($location))->withStatus(301);
        }

        // responder and renderer

        $rendererName = $session->get('renderer', $this->config->get('base.renderer'));

        $renderer = $this->rendererFactory->get($rendererName);
        $responder = $this->responderFactory->getByMeta($module, $request->getAttribute('responder', []));

        $language = $session->get('language', $this->config->get('base.language'));

        if ($responder instanceof Responder && $renderer instanceof Renderer) {
            $renderer->setRequest($request);

            $data = $responder($context->withAttribute('language', $language));
            $content = $renderer($data);

            $response->getBody()->write($content);
            $response = $response->withHeader('Content-Type', $request->getAttribute('content-type', 'text/html'));
        } else {
            $response->getBody()->write('Error: Undefined responder or renderer');
        }

        return $response;
    }

}
