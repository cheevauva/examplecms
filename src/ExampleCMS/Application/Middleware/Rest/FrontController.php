<?php

namespace ExampleCMS\Application\Middleware\Rest;

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

        $layout = $request->getAttribute('layout');
        $module = $request->getAttribute('module');

        if (empty($layout)) {
            return json_encode([]);
        }

        $data = $module->layout($layout)->execute([]);

        $response->getBody()->write(json_encode($data));

        return $response->withHeader('Content-Type', $request->getAttribute('contentType'));
    }

}
