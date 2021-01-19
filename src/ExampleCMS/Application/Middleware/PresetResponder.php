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
        $responder = $request->getAttribute('responder');

        if (empty($responder)) {
            return $handler->handle($request);
        }

        $module = $request->getAttribute('module');
        $context = $request->getAttribute('context', []);

        if (empty($context) && !empty($responder['context'])) {
            $context = $responder['context'];
        }

        $request = $request->withAttribute('context', $context);
        $request = $request->withAttribute('responder', $this->responderFactory->get($module, $responder['type'], $responder['component']));

        return $handler->handle($request);
    }

}
