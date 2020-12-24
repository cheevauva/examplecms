<?php

namespace ExampleCMS\Application\Layout;

class Basic extends \ExampleCMS\Application\Responder
{

    /**
     * @var string
     */
    public $layout;

    /**
     * @var \ExampleCMS\Contact\Responder\Layout
     */
    public $theme;

    /**
     * @var \ExampleCMS\Contract\Requst
     */
    public $request;

    /**
     * @var string
     */
    protected $templateType = 'layouts';

    public function execute($request)
    {
        $metadata = parent::execute($request);
        $metadata['baseUrl'] = $request->getAttribute('baseUrl');

        $views = [];

        if (empty($metadata['views'])) {
            $metadata['views'] = [];
        }

        if ($request->getAttribute('views')) {
            foreach ($request->getAttribute('views') as $name => $view) {
                $metadata['views'][$name] = $view;
            }
        }

        foreach ($metadata['views'] as $name => $view) {
            $views[$name] = $this->module->view($view)->execute($request);
        }

        $metadata['views'] = $views;

        return $metadata;
    }

}
