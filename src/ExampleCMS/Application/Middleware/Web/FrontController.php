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
        $context = $context->withAttribute('request', $request);

        $module = $context->getAttribute('module');
        $actions = $context->getAttribute('actions', []);

        foreach ($actions as $action) {
            $context = $this->actionFactory->get($action, $module)->execute($context);
        }

        $redirect = $context->getAttribute('redirect');

        $renderer = $context->getAttribute('renderer');
        $router = $context->getAttribute('router');
        $responder = $context->getAttribute('responder');
        $contentType = $context->getAttribute('contentType', 'text/html');

        if (!empty($redirect)) {
            $location = $router->make($redirect['route'], $redirect['params']);
            $response = $response->withHeader('Location', $location)->withStatus(301);

            return $response;
        }

        if ($responder instanceof Responder && $renderer instanceof Renderer) {
            $data = $responder($context);
            $content = $renderer($data);

            $response->getBody()->write($content);
        } else {
            $response->getBody()->write('Error: Undefined responder or renderer');
        }

        return $response->withHeader('Content-Type', $contentType);
    }

}
