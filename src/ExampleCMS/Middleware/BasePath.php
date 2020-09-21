<?php

namespace ExampleCMS\Middleware;

class BasePath
{

    public function __invoke($request, $response, $next)
    {
        $request = $request->withAttribute('basePath', $this->getBasePath($request));

        return $next($request, $response);
    }

    private static function getBasePath($request)
    {
        $server = $request->getServerParams();
        $filename = isset($server['SCRIPT_FILENAME']) ? $server['SCRIPT_FILENAME'] : '';
        $scriptName = isset($server['SCRIPT_NAME']) ? $server['SCRIPT_NAME'] : null;
        $phpSelf = isset($server['PHP_SELF']) ? $server['PHP_SELF'] : null;
        $origScriptName = isset($server['ORIG_SCRIPT_NAME']) ? $server['ORIG_SCRIPT_NAME'] : null;
        if ($scriptName !== null && basename($scriptName) === $filename) {
            $baseUrl = $scriptName;
        } elseif ($phpSelf !== null && basename($phpSelf) === $filename) {
            $baseUrl = $phpSelf;
        } elseif ($origScriptName !== null && basename($origScriptName) === $filename) {
            $baseUrl = $origScriptName;
        } else {
            $baseUrl = '/';
            $basename = basename($filename);
            if ($basename) {
                $path = ($phpSelf ? trim($phpSelf, '/') : '');
                $basePos = strpos($path, $basename) ? : 0;
                $baseUrl .= substr($path, 0, $basePos) . $basename;
            }
        }

        if (empty($baseUrl)) {
            return '';
        }

        $requestUri = $request->getUri()->getPath();

        if (0 === strpos($requestUri, $baseUrl)) {
            return $baseUrl;
        }

        $baseDir = str_replace('\\', '/', dirname($baseUrl));
        if (0 === strpos($requestUri, $baseDir)) {
            return $baseDir;
        }
        $truncatedRequestUri = $requestUri;
        if (false !== ($pos = strpos($requestUri, '?'))) {
            $truncatedRequestUri = substr($requestUri, 0, $pos);
        }
        $basename = basename($baseUrl);

        if (empty($basename) || false === strpos($truncatedRequestUri, $basename)) {
            return '';
        }

        if (strlen($requestUri) >= strlen($baseUrl) && (false !== ($pos = strpos($requestUri, $baseUrl)) && $pos !== 0)) {
            $baseUrl = substr($requestUri, 0, $pos + strlen($baseUrl));
        }
        return $baseUrl;
    }

}
