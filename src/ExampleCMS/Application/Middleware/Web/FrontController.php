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

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = $handler->handle($request);
        $request = $request->withAttribute('model', new \ArrayObject);

        $module = $request->getAttribute('module');
        $actions = $request->getAttribute('actions', []);

        foreach ($actions as $action) {
            $request = $module->action($action)->execute($request);
        }

        $redirect = $request->getAttribute('redirect');
        $context = $request->getAttribute('context', []);
        $renderer = $request->getAttribute('renderer');
        $router = $request->getAttribute('router');
        $responder = $request->getAttribute('responder');
        $contentType = $request->getAttribute('contentType');

        if (!empty($redirect)) {
            $location = $router->make($redirect['route'], $redirect['params']);
            $response = $response->withHeader('Location', $location)->withStatus(301);

            return $response;
        }

        if (empty($context['request'])) {
            $context['request'] = $request;
        }

        $context['language'] = $request->getAttribute('language');
        
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
