<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Application;

abstract class Responder implements \ExampleCMS\Contract\Responder
{

    /**
     * @var \ExampleCMS\Contract\Module
     */
    protected $module;

    /**
     * @var \ExampleCMS\Contract\Model
     */
    protected $model;

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

    public function setModel($model)
    {
        $this->model = $model;
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
            'module' => (string) $this->module,
            'language' => 'en_US',
        ];
    }

    public function execute($request)
    {
        $data = $this->metadata;
        $data['templateId'] = $this->getTemplateId($data);
        $data['module'] = $request->getAttribute('module');
        $data['language'] = $request->getAttribute('language');

        foreach ($this->getDefaultData() as $property => $value) {
            if (!isset($data[$property])) {
                $data[$property] = $value;
            }
        }

        return $data;
    }

    protected function getTemplateId()
    {
        if (isset($this->metadata['templatePath'])) {
            return $this->metadata['templatePath'];
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

}
