<?php

namespace ExampleCMS\Middleware;

class CliExtractArgs
{

    public function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response, $next)
    {
        $argv = $_SERVER['argv'];
        $args = $argv;

        array_shift($args);

        if (empty($args)) {
            $response->getBody()->write('args not define');
            
            return $response;
        }

        $request = $request->withUri(new \Zend\Diactoros\Uri($args[0]));

        if (!empty($args[1])) {
            parse_str($args[1], $data);
            $request = $request->withParsedBody($data);
        }

        return $next($request, $response);
    }

}
