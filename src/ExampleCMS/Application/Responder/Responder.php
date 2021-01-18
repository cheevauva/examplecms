<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Application\Responder;

abstract class Responder implements \ExampleCMS\Contract\Application\Responder
{

    /**
     * @var \ExampleCMS\Contract\Module
     */
    protected $module;

    /**
     * @var array
     */
    protected $metadata;

    /**
     * @var string
     */
    protected $templateType;

    public function setModule($module)
    {
        $this->module = $module;
    }

    /**
     * @param array $metadata
     */
    public function setMetadata(array $metadata)
    {
        $this->metadata = $metadata;
    }

    protected function getDefaultData()
    {
        return [
            'module' => $this->module->getName(),
            'language' => 'en_US',
        ];
    }

    public function execute(array $context)
    {
        $data = [];
        $data['templateId'] = $this->getTemplateId();
        $data['module'] = $context['module'] ?? null;
        $data['language'] = $context['language'] ?? null;

        foreach ($this->getDefaultData() as $property => $value) {
            if (!isset($data[$property])) {
                $data[$property] = $value;
            }
        }

        return $data;
    }

    protected function getTemplateId()
    {
        if (isset($this->metadata['templateId'])) {
            return $this->metadata['templateId'];
        }

        $template = $this->metadata['component'];

        if (isset($this->metadata['template'])) {
            $template = $this->metadata['template'];
        }

        return [
            $this->templateType,
            $template
        ];
    }

    public function __debugInfo()
    {
        return [
            $this->metadata,
        ];
    }

}
