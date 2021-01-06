<?php

namespace ExampleCMS\Application\Middleware\Rest;

class FrontController extends \ExampleCMS\Application\Middleware\Web\FrontController
{

    const CONTENT_TYPE_DEFAULT = 'application/json';

    protected function getContent($request, $module)
    {
        $layout = $request->getAttribute('layout');

        if (empty($layout)) {
            return json_encode([]);
        }

        $request = $this->prepareUserScopeForms($request);

        $context = $request->withoutAttribute('session')->getAttributes();
        $context['request'] = $request;

        $data = $module->layout($layout)->execute($context);
        
        return json_encode($data);
    }

}
