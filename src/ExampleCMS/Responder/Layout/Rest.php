<?php

namespace ExampleCMS\Responder\Layout;

class Rest extends \ExampleCMS\Responder\Common
{

    protected $templateType = 'layouts';
    public $router;

    public function getData()
    {
        $metadata = parent::getData();

        $metadata['view'] = $this->prepareView($this->router->get('view'))->getData();

        return $metadata;
    }
}
