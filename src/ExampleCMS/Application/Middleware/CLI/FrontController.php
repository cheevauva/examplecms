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

    public $moduleFactory;
    public $metadata;

    /**
     * @return array
     */
    protected function getRoutes()
    {
        $appName = $this->request->getAttribute('appName');

        if ($this->config->get('base.setup')) {
            $appName .= 'setup';
        }
        $this->routes = $this->metadata->get(['routes', $appName]);

        return $this->routes;
    }

    protected function renderCommands($scriptName)
    {
        $routes = $this->getRoutes();
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
        $this->request = $request;

        $action = $request->getAttribute('action');
        $args = $request->getAttribute('argv');
        $scriptName = array_shift($args);

        if (empty($args)) {
            $response = $this->response;
            $response->getBody()->write($this->renderCommands($scriptName));

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
