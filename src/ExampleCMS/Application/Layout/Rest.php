<?php

namespace ExampleCMS\Application\Layout;

class Rest extends \ExampleCMS\Application\Responder
{

    protected $templateType = 'layouts';
    public $router;

    public function execute()
    {
        $metadata = parent::execute();

        $metadata['view'] = $this->prepareView($this->router->get('view'))->execute();

        return $metadata;
    }

}
