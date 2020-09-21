<?php

namespace ExampleCMS\Middleware;

class CliExtractArgs
{

    public function __invoke(\Psr\Http\Message\ServerRequestInterface $request, $response, $next)
    {
        if (!$request->getParsedBody() && $request->getAttribute('form')) {
            fputs(STDOUT, $request->getAttribute('form') . ':' . PHP_EOL);
            parse_str(trim(fgets(STDIN)), $parsedBody);
            $request = $request->withParsedBody($parsedBody);
        }
        
        return $request;
    }

}
