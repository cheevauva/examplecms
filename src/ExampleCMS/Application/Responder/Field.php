<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Responder;

class Field extends \ExampleCMS\Application\Responder\Responder implements \ExampleCMS\Contract\Application\Field
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

    protected function getDefaultData()
    {
        $defaultValue = null;

        if (isset($this->metadata['defaultValue'])) {
            $defaultValue = $this->metadata['defaultValue'];
        }

        return [
            'name' => null,
            'value' => $defaultValue,
            'id' => null,
            'formName' => null,
        ];
    }

}
