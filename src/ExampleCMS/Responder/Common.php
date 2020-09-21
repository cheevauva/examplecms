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
        $this->responder = $module->responder();
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

    public function getData($request)
    {
        $metadata = $this->metadata;
        $metadata['templatePath'] = $this->getTemplatePath($metadata);

        return $metadata;
    }

    protected function getTemplatePath()
    {
        if (isset($this->metadata['templatePath'])) {
            return $this->metadata['templatePath'];
        }

        $template = $this->metadata['type'];

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
