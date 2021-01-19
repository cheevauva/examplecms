<?php

namespace ExampleCMS\Application\Middleware;

use Psr\Http\{
    Message\ServerRequestInterface,
    Message\ResponseInterface,
    Server\RequestHandlerInterface,
    Server\MiddlewareInterface
};

class PresetThemeBySession implements MiddlewareInterface
{

    /**
     * @var \ExampleCMS\Contract\Config 
     */
    public $config;

    /**
     * @var \ExampleCMS\Contract\Factory\Theme
     */
    public $themeFactory;

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        /* @var $theme string */
        $theme = $request->getAttribute('theme');

        if ($theme) {
            $request = $request->withAttribute('theme', $this->themeFactory->get($theme));
            
            return $handler->handle($request);
        }

        /* @var $session \ExampleCMS\Contract\Session */
        $session = $request->getAttribute('session');

        $theme = $session->get('theme');

        if (!$theme) {
            $theme = $this->config->get('base.theme');
        }

        $request = $request->withAttribute('theme', $this->themeFactory->get($theme));

        return $handler->handle($request);
    }

}
