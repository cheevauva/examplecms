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
        $sessionIdIsNew = false;

        if (!$sessionId) {
            $sessionId = $this->generateSessionId();
            $sessionIdIsNew = true;
        }

        $session = $this->sessionFactory->get($sessionEngine);
        $session->setSessionId($sessionId);

        $response = $handler->handle($request->withAttribute('session', $session));

        $session->write();

        if (!$session->getSessionId()) {
            return $response;
        }

        if ($sessionIdIsNew) {
            return $this->addSessionToResponse($session, $response);
        }

        return $response;
    }

    protected function addSessionToResponse(\ExampleCMS\Contract\Session $session, ResponseInterface $response)
    {
        $cookie = "";
        $cookie .= sprintf('%s=%s;', $this->getSessionName(), $session->getSessionId());
        $cookie .= sprintf('%s=%s;', 'Expires', 'Wed, 09 Jun 2038 10:18:14 GMT');
        $cookie .= sprintf('%s=%s;', 'Path', $this->getPath($request));

        return $response->withHeader('Set-Cookie', $cookie);
    }

    protected function getPath(ServerRequestInterface $request)
    {
        return $request->getAttribute('basePath');
    }

    protected function getSessionName()
    {
        return $this->config->get('base.session.name', 'EXAMPLECMSID');
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

    protected function generateSessionId()
    {
        return random_bytes(200) . microtime(true);
    }

}
