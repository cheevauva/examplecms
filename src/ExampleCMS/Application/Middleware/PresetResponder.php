<?php

namespace ExampleCMS\Application\Middleware;

use Psr\Http\{
    Message\ServerRequestInterface,
    Message\ResponseInterface,
    Server\RequestHandlerInterface,
    Server\MiddlewareInterface
};

class PresetResponder implements MiddlewareInterface
{

    /**
     * @var \ExampleCMS\Contract\Factory\Responder
     */
    public $responderFactory;

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $responder = $request->getAttribute('responder', []);

        if (empty($responder)) {
            return $handler->handle($request);
        }

        $module = $request->getAttribute('context')->getAttribute('module');
        $request = $request->withAttribute('responder', $this->responderFactory->getByMeta($module, $responder));

        return $handler->handle($request);
    }

}
