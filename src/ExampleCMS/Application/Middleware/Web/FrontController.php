<?php

namespace ExampleCMS\Application\Middleware\Web;

use Psr\Http\{
    Message\ServerRequestInterface,
    Message\ResponseInterface,
    Server\RequestHandlerInterface,
    Server\MiddlewareInterface
};

class FrontController implements MiddlewareInterface
{

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = $handler->handle($request);
        $request = $request->withAttribute('model', new \ArrayObject);

        $module = $request->getAttribute('module');
        $redirect = $request->getAttribute('redirect');
        $actions = $request->getAttribute('actions', []);
        $layout = $request->getAttribute('layout');
        $theme = $request->getAttribute('theme');
        $router = $request->getAttribute('router');

        foreach ($actions as $action) {
            $request = $module->action($action)->execute($request);
        }

        if (!empty($redirect)) {
            $location = $router->make($redirect['route'], $redirect['params']);

            return $response->withHeader('Location', $location)->withStatus(301);
        }

        if (!empty($layout) && !empty($theme)) {
            $context = $request->withoutAttribute('session')->getAttributes();
            $context['request'] = $request;

            $data = $module->layout($layout)->execute($context);
            $response->getBody()->write($theme($data));
        }

        return $response->withHeader('Content-Type', $request->getAttribute('contentType'));
    }

}
