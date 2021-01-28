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
        /* @var $context \ExampleCMS\Contract\Context */
        $context = $request->getAttribute('context');
        
        $responder = $context->getAttribute('responder', []);

        if (empty($responder)) {
            return $handler->handle($request);
        }

        $module = $context->getAttribute('module');

        if (!empty($responder['context'])) {
            $context = $context->withAttributes($responder['context']);
        }
        
        $context = $context->withAttribute('responder', $this->responderFactory->get($module, $responder['type'], $responder['component']));

        $request = $request->withAttribute('context', $context);

        return $handler->handle($request);
    }

}
