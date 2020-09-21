<?php

namespace ExampleCMS\Responder\Layout;

class Basic extends \ExampleCMS\Responder\Common
{

    /**
     * @var string
     */
    public $layout;

    /**
     * @var \ExampleCMS\Contract\Bundle
     */
    public $bundle;

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

    public function getData($request)
    {
        $metadata = parent::getData($request);
        $metadata['basePath'] = $request->getAttribute('basePath');

        $views = array();

        if (empty($metadata['views'])) {
            $metadata['views'] = array();
        }

        foreach ($metadata['views'] as $name => $view) {
            $views[$name] = $this->responder->view($view)->getData($request);
        }

        $metadata['views'] = $views;

        return $metadata;
    }

}
