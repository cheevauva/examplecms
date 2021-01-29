<?php

namespace ExampleCMS\Application\Middleware;

use Psr\Http\{
    Message\ServerRequestInterface,
    Message\ResponseInterface,
    Server\RequestHandlerInterface,
    Server\MiddlewareInterface
};

class Session implements MiddlewareInterface
{

    /**
     * @var \ExampleCMS\Contract\Factory\Session
     */
    public $sessionFactory;

    /**
     * @var \ExampleCMS\Contract\Config
     */
    public $config;

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $cookies = $request->getCookieParams();
        $sessionId = null;
        $sessionName = $this->config->get(['base', 'session', 'name']);
        $engine = $this->config->get(['base', 'session', 'engine']);

        if (empty($engine)) {
            $engine = 'sessionOverFile';
        }

        if (!empty($cookies[$sessionName])) {
            $sessionId = $cookies[$sessionName];
        }

        $session = $this->sessionFactory->get($engine);
        $session->setSessionId($sessionId);

        $context = $request->getAttribute('context');
        $context = $context->withAttribute('session', $session);

        $request = $request->withAttribute('context', $context);

        $response = $handler->handle($request);

        $session->write();

        if (!$session->getSessionId()) {
            return $response;
        }

        if (empty($sessionId) || $sessionId !== $session->getSessionId()) {
            $response = $response->withHeader('Set-Cookie', $sessionName . '=' . $session->getSessionId() . '; Expires=Wed, 09 Jun 2038 10:18:14 GMT');
        }

        return $response;
    }

}
