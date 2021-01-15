<?php

namespace ExampleCMS\Application\Middleware\CLI;

use Psr\Http\{
    Message\ServerRequestInterface,
    Message\ResponseInterface,
    Server\RequestHandlerInterface,
    Server\MiddlewareInterface
};

class OopsHandler extends \ExampleCMS\Application\Middleware\Web\OopsHandler implements MiddlewareInterface
{

    /**
     * @var \ExampleCMS\Contract\Factory\Module
     */
    public $moduleFactory;

    /**
     * @var ResponseInterface
     */
    public $response;

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        try {
            return $handler->handle($request);
        } catch (\Exception $exception) {
            $request = $request->withAttribute('exception', $exception);

            $message = [];
            $message[] = $exception->getMessage();
            $message[] = '';
            $message[] = $exception->getFile() . '(' . $exception->getLine() . ')';
            $message[] = $exception->getTraceAsString();

            $response = $this->response;
            $response->getBody()->write(implode(PHP_EOL, $message));
        }

        return $response;
    }

    protected function getModuleByRequest($request)
    {
        return $this->moduleFactory->get($request->getAttribute('module'));
    }

}
