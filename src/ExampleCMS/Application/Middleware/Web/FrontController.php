<?php

namespace ExampleCMS\Application\Middleware\Web;

use Psr\Http\{
    Message\ServerRequestInterface,
    Message\ResponseInterface,
    Server\RequestHandlerInterface,
    Server\MiddlewareInterface
};

class FrontController implements MiddlewareInterface
{

    /**
     * @var \ExampleCMS\Contract\Factory\Module
     */
    public $moduleFactory;

    /**
     * @var \ExampleCMS\Contract\Factory\Theme
     */
    public $themeFactory;

    /**
     * @var \ExampleCMS\Contract\Metadata
     */
    public $metadata;

    /**
     * @var \ExampleCMS\Contract\Config
     */
    public $config;

    const CONTENT_TYPE_DEFAULT = 'text/html';

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = $handler->handle($request);
        $module = $this->getModuleByRequest($request);
        $router = $request->getAttribute('router');

        $request = $this->presetLanguageByRequest($request);
        $request = $this->presetThemeByRequest($request);
        $request = $this->presetContentTypeByRequest($request);
        $request = $request->withAttribute('model', new \ArrayObject);

        $actions = $request->getAttribute('actions');

        if (!empty($actions)) {
            foreach ($actions as $action) {
                $request = $module->action($action)->execute($request);
            }
        }

        $redirect = $request->getAttribute('redirect');

        if (!empty($redirect)) {
            $location = $request->getAttribute('router')->make($redirect['route'], $redirect['params']);

            return $response->withHeader('Location', $location)->withStatus(301);
        }


        $response->getBody()->write($this->getContent($request, $module));

        return $response->withHeader('Content-Type', $request->getAttribute('contentType'));
    }

    protected function getContent(ServerRequestInterface $request, \ExampleCMS\Contract\Module $module)
    {
        $layout = $request->getAttribute('layout');

        if (empty($layout)) {
            return '';
        }

        $context = $request->withoutAttribute('session')->getAttributes();
        $context['request'] = $request;

        $data = $module->layout($layout)->execute($context);
        $theme = $this->themeFactory->get($request->getAttribute('theme'));
        $content = $theme->render($data);

        return $content;
    }

    protected function getModuleByRequest(ServerRequestInterface $request)
    {
        $module = $request->getAttribute('module');

        if (empty($module)) {
            throw new \ExampleCMS\Exception\Http\NotFound;
        }

        $modules = $this->metadata->get(['modules']);

        if (empty($modules[$module])) {
            throw new \ExampleCMS\Exception\Http\NotFound;
        }

        if (!empty($modules[$module]['hide'])) {
            throw new \ExampleCMS\Exception\Http\NotFound;
        }

        return $this->moduleFactory->get($module);
    }

    protected function presetContentTypeByRequest(ServerRequestInterface $request)
    {
        $contentType = $request->getAttribute('contentType');

        if ($contentType) {
            return $request;
        }

        return $request->withAttribute('contentType', static::CONTENT_TYPE_DEFAULT);
    }

    /**
     * @param ServerRequestInterface $request
     * @return ServerRequestInterface
     * @
     */
    protected function presetThemeByRequest(ServerRequestInterface $request)
    {
        /* @var $theme string */
        $theme = $request->getAttribute('theme');

        if ($theme) {
            return $request;
        }

        /* @var $session \ExampleCMS\Contract\Session */
        $session = $request->getAttribute('session');

        $theme = $session->get('theme');

        if (!$theme) {
            $theme = $this->config->get('base.theme');
        }

        return $request->withAttribute('theme', $theme);
    }

    protected function presetLanguageByRequest(ServerRequestInterface $request)
    {
        /* @var $language string */
        $language = $request->getAttribute('language');

        if ($language) {
            return $request;
        }

        /* @var $session \ExampleCMS\Contract\Session */
        $session = $request->getAttribute('session');

        $language = $session->get('language');

        if (!$language) {
            $language = $this->config->get('base.language');
        }

        return $request->withAttribute('language', $language);
    }

}
