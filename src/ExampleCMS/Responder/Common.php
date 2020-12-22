<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Responder;

abstract class Common implements \ExampleCMS\Contract\Responder
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
        return [];
    }

    public function execute($request)
    {
        $data = $this->metadata;
        $data['templatePath'] = $this->getTemplatePath($data);

        foreach ($this->getDefaultData() as $property => $value) {
            if (!isset($data[$property])) {
                $data[$property] = $value;
            }
        }

        return $data;
    }

    protected function getTemplatePath()
    {
        if (isset($this->metadata['templatePath'])) {
            return $this->metadata['templatePath'];
        }

        $template = $this->metadata['component'];

        if (isset($this->metadata['template'])) {
            $template = $this->metadata['template'];
        }

        return [
            (string) $this->module,
            $this->templateType,
            $template
        ];
    }

}
