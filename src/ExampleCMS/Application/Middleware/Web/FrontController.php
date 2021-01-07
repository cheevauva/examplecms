<?php

namespace ExampleCMS\Application\Middleware\Web;

use Psr\Http\Message\ServerRequestInterface as RequestInterface;

class FrontController
{

    /**
     * @var \ExampleCMS\Contract\Factory\Module
     */
    public $moduleFactory;

    /**
     * @var \ExampleCMS\Contract\Factory\Module
     */
    public $themeFactory;

    /**
     * @var \ExampleCMS\Contract\Metadata
     */
    public $metadata;

    const CONTENT_TYPE_DEFAULT = 'text/html';

    public function __invoke(RequestInterface $request, $response, $next)
    {
        $module = $this->getModuleByRequest($request);
        $router = $request->getAttribute('router');

        $request = $this->presetLanguageByRequest($request);
        $request = $this->presetThemeByRequest($request);
        $request = $this->presetContentTypeByRequest($request);
        $request = $this->prepareModelFormsByRequest($module, $request);

        $actions = $request->getAttribute('actions');

        if (!empty($actions)) {
            foreach ($actions as $action) {
                $request = $module->action($action)->execute($request);
            }
        }

        $redirect = $request->getAttribute('redirect');

        if (!empty($redirect)) {
            $location = $request->getAttribute('router')->make($redirect['route'], $redirect['params']);
            $response = $response->withHeader('Location', $location)->withStatus(301);

            return $next($request, $response);
        }


        $response->getBody()->write($this->getContent($request, $module));
        $response = $response->withHeader('Content-Type', $request->getAttribute('contentType'));

        return $next($request, $response);
    }

    protected function getContent($request, $module)
    {
        $layout = $request->getAttribute('layout');

        if (empty($layout)) {
            return '';
        }
        
        $request = $this->prepareUserScopeForms($request);

        $context = $request->withoutAttribute('session')->getAttributes();
        $context['request'] = $request;

        $data = $module->layout($layout)->execute($context);
        $theme = $this->themeFactory->get($request->getAttribute('theme'));
        $content = $theme->render($data);

        return $content;
    }

    protected function prepareUserScopeForms(RequestInterface $request)
    {
        $modelForms = $request->getAttribute('modelForms');

        if (!$modelForms) {
            return $request;
        }
        $formattedForms = [];

        foreach ($modelForms as $form => $modelForm) {
            $formattedForm = new \ArrayObject();
            $modelForm->doMappingFromModelToData($formattedForm);
            $formattedForms[$form] = $formattedForm;
        }

        return $request->withAttribute('formattedForms', $formattedForms);
    }

    protected function prepareModelFormsByRequest($module, RequestInterface $request)
    {
        $forms = $request->getAttribute('forms');

        if (empty($forms)) {
            return $request;
        }

        $modelForms = [];

        foreach ($forms as $form) {
            $modelForm = $module->form($form);
            $modelForm->doMappingFromDataToModel($request);

            $modelForms[$form] = $modelForm;
        }

        return $request->withAttribute('modelForms', $modelForms);
    }

    protected function getModuleByRequest(RequestInterface $request)
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

    protected function presetContentTypeByRequest(RequestInterface $request)
    {
        $contentType = $request->getAttribute('contentType');

        if ($contentType) {
            return $request;
        }

        return $request->withAttribute('contentType', static::CONTENT_TYPE_DEFAULT);
    }

    protected function presetThemeByRequest(RequestInterface $request)
    {
        $theme = $request->getAttribute('theme');

        if ($theme) {
            return $request;
        }

        /** @var \ExampleCMS\Contract\Session $session */
        $session = $request->getAttribute('session');

        $theme = $session->get('theme');

        if (!$theme) {
            $theme = $this->config->get('base.theme');
        }

        return $request->withAttribute('theme', $theme);
    }

    protected function presetLanguageByRequest(RequestInterface $request)
    {
        $language = $request->getAttribute('language');

        if ($language) {
            return $request;
        }

        /** @var \ExampleCMS\Contract\Session $session */
        $session = $request->getAttribute('session');

        $language = $session->get('language');

        if (!$language) {
            $language = $this->config->get('base.language');
        }

        return $request->withAttribute('language', $language);
    }

}
