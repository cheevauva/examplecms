<?php

namespace ExampleCMS\Application\Middleware;

use Psr\Http\{
    Message\ServerRequestInterface,
    Message\ResponseInterface,
    Server\RequestHandlerInterface,
    Server\MiddlewareInterface
};

class PresetContentTypeHtml implements MiddlewareInterface
{

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $contentType = $request->getAttribute('contentType');

        if ($contentType) {
            return $handler->handle($request);
        }

        $request = $request->withAttribute('contentType', 'text/html');

        return $handler->handle($request);
    }

}
