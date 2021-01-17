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
        /* @var $language string */
        $language = $request->getAttribute('language');

        if ($language) {
            return $handler->handle($request);;
        }

        /* @var $session \ExampleCMS\Contract\Session */
        $session = $request->getAttribute('session');

        $language = $session->get('language');

        if (!$language) {
            $language = $this->config->get('base.language');
        }

        $request = $request->withAttribute('language', $language);

        return $handler->handle($request);
    }

}
