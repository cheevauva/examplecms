<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Application;

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

    protected function getModelByRequest($request)
    {
        $model = $request->getAttribute('model');

        return $model;
    }

    protected function getDefaultData()
    {
        return [
            'module' => $this->module->getModule(),
            'language' => 'en_US',
        ];
    }

    public function execute(array $context)
    {
        $context = $this->rewriteContext($context);

        $data = [];
        $data['templateId'] = $this->getTemplateId();
        $data['module'] = $context['module'];
        $data['language'] = $context['language'];

        foreach ($this->getDefaultData() as $property => $value) {
            if (!isset($data[$property])) {
                $data[$property] = $value;
            }
        }

        return $data;
    }

    protected function rewriteContext($context)
    {
        return $context;
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
