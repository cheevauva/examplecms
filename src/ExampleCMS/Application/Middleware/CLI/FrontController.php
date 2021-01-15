<?php

namespace ExampleCMS\Application\Middleware\CLI;

use Psr\Http\{
    Message\ServerRequestInterface,
    Message\ResponseInterface,
    Server\RequestHandlerInterface,
    Server\MiddlewareInterface
};
use \ExampleCMS\Application\Middleware\Web\FrontController as WebFrontController;

class FrontController extends WebFrontController
{

    /**
     * @var ResponseInterface
     */
    public $response;

    /**
     * @return array|\ArrayAccess
     */
    protected function getRoutes($request)
    {
        $appName = $request->getAttribute('appName');

        if ($this->config->get('base.setup')) {
            $appName .= 'setup';
        }
        
        return $this->metadata->get(['routes', $appName]);
    }

    protected function renderCommands($scriptName, $request)
    {
        $routes = $this->getRoutes($request);
        $content = [];

        $content[] = 'Choose:';

        foreach ($routes as $route) {
            $content[] = $scriptName . ' ' . $route['route'];
        }

        $content[] = '';

        return implode(PHP_EOL, $content);
    }

    protected function renderRedirect($scriptName, $redirect)
    {
        $content = [];
        $content[] = $scriptName . ' ' . $redirect['route'] . ' ' . http_build_query($redirect['params']);
        $content[] = '';

        return implode(PHP_EOL, $content);
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {

        $action = $request->getAttribute('action');
        $args = $request->getAttribute('argv');
        $scriptName = array_shift($args);

        if (empty($args)) {
            $response = $this->response;
            $response->getBody()->write($this->renderCommands($scriptName, $request));

            return $response;
        }
        print_r($request->getAttribute('module'));

        print_r($request->getUri());
        print_r($request->getParsedBody());

        $module = $this->getModuleByRequest($request);

        if ($action) {
            $request = $module->action($action)->execute($request);
        }

        $redirect = $request->getAttribute('redirect');

        if (!empty($redirect)) {
            $response = $this->response;
            $response->getBody()->write($this->renderRedirect($scriptName, $redirect));

            return $response;
        }

        return $handler->handle($request);
    }

}
