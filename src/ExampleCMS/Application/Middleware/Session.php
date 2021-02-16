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
        $sessionEngine = $this->config->get('base.session.engine', 'sessionOverFile');
        $sessionId = $this->getSessionIdByRequest($request);

        $session = $this->sessionFactory->get($sessionEngine);
        $session->setSessionId($sessionId);

        $response = $handler->handle($request->withAttribute('session', $session));

        $session->write();

        return $this->addSessionIdToResponse($session, $response);
    }

    protected function getSessionName()
    {
        return $this->config->get('base.session.name', 'EXAMPLECMS_SID');
    }

    protected function addSessionIdToResponse(\ExampleCMS\Contract\Session $session, ResponseInterface $response)
    {
        $sessionName = $this->getSessionName();
        $sessionId = $session->getSessionId();

        if (empty($sessionId) || $sessionId !== $session->getSessionId()) {
            $response = $response->withHeader('Set-Cookie', $sessionName . '=' . $session->getSessionId() . '; Expires=Wed, 09 Jun 2038 10:18:14 GMT');
        }

        return $response;
    }

    protected function getSessionIdByRequest(ServerRequestInterface $request)
    {
        $sessionName = $this->getSessionName();
        $sessionId = null;

        $cookies = $request->getCookieParams($request);

        if (!empty($cookies[$sessionName])) {
            $sessionId = $cookies[$sessionName];
        }

        return $sessionId;
    }

}
