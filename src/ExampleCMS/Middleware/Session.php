<?php

namespace ExampleCMS\Middleware;

class Session
{

    /**
     * @var string
     */
    protected $sessionName = 'EXAMPLECMSID';

    /**
     *
     * @var \ExampleCMS\Contract\Factory\Session
     */
    public $sessionFactory;

    public function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response, $next)
    {
        $cookies = $request->getCookieParams();
        $sessionId = null;

        if (!empty($cookies[$this->sessionName])) {
            $sessionId = $cookies[$this->sessionName];
        }

        $session = $this->sessionFactory->get($sessionId);

        $request = $request->withAttribute('session', $session);

        $response = $next($request, $response);

        $session->write();

        if (!$session->getSessionId()) {
            return $response;
        }

        if (empty($sessionId) || $sessionId !== $session->getSessionId()) {
            $response = $response->withHeader('Set-Cookie', $this->sessionName . '=' . $session->getSessionId() . '; Expires=Wed, 09 Jun 2021 10:18:14 GMT');
        }

        return $response;
    }

}
