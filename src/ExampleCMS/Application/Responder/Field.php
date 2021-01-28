<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Responder;

use ExampleCMS\Contract\Context;

class Field extends \ExampleCMS\Responder implements \ExampleCMS\Contract\Responder
{

    /**
     * @var string 
     */
    protected $templateType = 'fields';

    protected function getTemplateId()
    {
        $templateId = [];

        $templateId[] = $this->templateType;
        $templateId[] = $this->metadata['component'];
        $templateId[] = !isset($this->metadata['template']) ? 'view' : $this->metadata['template'];

        return $templateId;
    }

    public function execute(Context $context)
    {
        $defaultValue = null;

        if (isset($this->metadata['defaultValue'])) {
            $defaultValue = $this->metadata['defaultValue'];
        }

        $data = parent::execute($context);
        $data['name'] = null;
        $data['value'] = $defaultValue;
        $data['id'] = null;
        $data['formName'] = null;

        return $data;
    }

}
