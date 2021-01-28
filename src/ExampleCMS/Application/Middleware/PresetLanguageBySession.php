<?php

namespace ExampleCMS\Application\Middleware;

use Psr\Http\{
    Message\ServerRequestInterface,
    Message\ResponseInterface,
    Server\RequestHandlerInterface,
    Server\MiddlewareInterface
};

class PresetLanguageBySession implements MiddlewareInterface
{

    /**
     * @var \ExampleCMS\Contract\Config 
     */
    public $config;

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $context = $request->getAttribute('context');

        /* @var $language string */
        $language = $context->getAttribute('language');

        if ($language) {
            return $handler->handle($request);
        }

        /* @var $session \ExampleCMS\Contract\Session */
        $session = $context->getAttribute('session');

        $language = $session->get('language');

        if (!$language) {
            $language = $this->config->get('base.language');
        }

        $context = $context->withAttribute('language', $language);
        $request = $request->withAttribute('context', $context);

        return $handler->handle($request);
    }

}
