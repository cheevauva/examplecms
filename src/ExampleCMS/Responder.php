<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS;

abstract class Responder implements \ExampleCMS\Contract\Responder
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
    
    /**
     * @var \ExampleCMS\Contract\Factory\Responder 
     */
    public $responderFactory;

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

    public function execute(array $context)
    {
        $data = [];
        $data['templateId'] = $this->getTemplateId();
        $data['module'] = $context['module'] ?? $this->module->getName();
        $data['language'] = $context['language'] ?? 'en_US';
        
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

    /**
     * 
     * @param string $type
     * @param string|array $name
     * @return \ExampleCMS\Contract\Responder
     */
    protected function responder($type, $name)
    {
        return $this->responderFactory->get($this->module, $type, $name);
    }

    public function __invoke($context)
    {
        return $this->execute($context);
    }

}
