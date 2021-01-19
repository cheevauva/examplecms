<?php

namespace ExampleCMS\Application\Middleware;

use Psr\Http\{
    Message\ServerRequestInterface,
    Message\ResponseInterface,
    Server\RequestHandlerInterface,
    Server\MiddlewareInterface
};

class PresetRendererBySession implements MiddlewareInterface
{

    /**
     * @var \ExampleCMS\Contract\Config 
     */
    public $config;

    /**
     * @var \ExampleCMS\Contract\Factory\Renderer
     */
    public $rendererFactory;

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        /* @var $renderer string */
        $renderer = $request->getAttribute('renderer');

        if ($renderer) {
            $request = $request->withAttribute('renderer', $this->rendererFactory->get($renderer));
            
            return $handler->handle($request);
        }

        /* @var $session \ExampleCMS\Contract\Session */
        $session = $request->getAttribute('session');

        $renderer = $session->get('renderer');

        if (!$renderer) {
            $renderer = $this->config->get('base.renderer');
        }

        $request = $request->withAttribute('renderer', $this->rendererFactory->get($renderer));

        return $handler->handle($request);
    }

}
