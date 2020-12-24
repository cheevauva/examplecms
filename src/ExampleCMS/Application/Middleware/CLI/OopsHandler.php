<?php

namespace ExampleCMS\Application\Middleware\CLI;

class OopsHandler
{

    public function __invoke($request, $response, $next)
    {
        try {
            return $next($request, $response);
        } catch (\Exception $exception) {
            $request = $request->withAttribute('exception', $exception);

            $message = [];
            $message[] = $exception->getMessage();
            $message[] = '';
            $message[] = $exception->getFile() . '(' . $exception->getLine() . ')';
            $message[] = $exception->getTraceAsString();

            $response->getBody()->write(implode(PHP_EOL, $message));
        }

        return $response;
    }

    protected function getModuleByRequest($request)
    {
        return $this->moduleFactory->get($request->getAttribute('module'));
    }

}
