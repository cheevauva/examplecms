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

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = $handler->handle($request);

        /* @var $context \ExampleCMS\Contract\Context */
        $context = $request->getAttribute('context');
        $context = $context->withAttribute('forms', function () use ($request) {
            return $request->getParsedBody();
        });
        $context = $context->withAttribute('examplecms_timestart', function () use ($request) {
            return $request->getAttribute('examplecms_timestart');
        });

        $module = $context->getAttribute('module');
        $actions = $context->getAttribute('actions', []);

        foreach ($actions as $action) {
            $context = $this->actionFactory->get($action, $module)->execute($context);
        }

        $location = $context->getAttribute('location');
        
        if ($location) {
            return $response->withHeader('Location', $location)->withStatus(301);
        }

        $session = $request->getAttribute('session');
        $session->set('language', $context->getAttribute('language'));

        $renderer = $context->getAttribute('renderer');
        $responder = $context->getAttribute('responder');
        $contentType = $context->getAttribute('contentType', 'text/html');

        if ($responder instanceof Responder && $renderer instanceof Renderer) {
            $data = $responder($context);
            $content = $renderer($data);

            $response->getBody()->write($content);
            $response = $response->withHeader('Content-Type', $contentType);
        } else {
            $response->getBody()->write('Error: Undefined responder or renderer');
        }

        return $response;
    }

}
