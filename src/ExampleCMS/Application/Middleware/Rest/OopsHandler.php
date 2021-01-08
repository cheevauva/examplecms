<?php

namespace ExampleCMS\Application\Middleware\Rest;

use Psr\Http\{
    Message\ServerRequestInterface,
    Message\ResponseInterface,
    Server\RequestHandlerInterface,
    Server\MiddlewareInterface
};

class OopsHandler extends \ExampleCMS\Application\Middleware\Web\OopsHandler
{

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): \Psr\Http\Message\ResponseInterface
    {
        try {
            return $handler->handle($request);
        } catch (\Exception $exception) {
            $request = $request->withAttribute('exception', $exception);

            if (!empty($exception->request)) {
                $module = $this->getModuleByRequest($exception->request);
            } else {
                $module = $this->moduleFactory->get($this->config->get(['base', 'module']));
            }

            $themeName = $request->getAttribute('theme');

            if (empty($themeName)) {
                $themeName = $this->config->get('base.theme');
            }


            $data = $module->layout('json-exception')->execute($request);
            $data['trace'] = $exception->getTrace();

            $content = $module->theme($themeName)->make($data);

            $response = $this->response;
            $response = $response->withHeader('Content-Type', 'application/json');
            $response->getBody()->write($content);

            return $response;
        }
    }
}
