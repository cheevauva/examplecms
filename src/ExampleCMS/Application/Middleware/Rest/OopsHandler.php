<?php

namespace ExampleCMS\Application\Middleware\Rest;

use Psr\Http\{
    Message\ServerRequestInterface,
    Message\ResponseInterface,
    Server\RequestHandlerInterface,
    Server\MiddlewareInterface
};

class OopsHandler extends \ExampleCMS\Application\Middleware\Web\OopsHandler
{

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): \Psr\Http\Message\ResponseInterface
    {
        try {
            return $handler->handle($request);
        } catch (\Exception $exception) {
            $response = $this->response;
            $response = $response->withHeader('Content-Type', 'application/json');
            $response->getBody()->write(json_encode([
                'error' => $exception->getMessage(),
                'description' => $exception->getTraceAsString(),
                'result' => false,
            ]));

            return $response;
        }
    }

}
