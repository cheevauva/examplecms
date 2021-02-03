<?php

namespace ExampleCMS\Module\Installer\Action;

class Index extends \ExampleCMS\Application\Action\Action
{

    /**
     * @var \ExampleCMS\Contract\Collection
     */
    public $collection;

    public function execute(\ExampleCMS\Contract\Context $context)
    {
        $model = $this->modelFactory->get('base');
        
        $collection = $this->collection;
        $collection->add($model);

        return $context->withCollection($this->metadata['collection'], $collection);
    }

}
