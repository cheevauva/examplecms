<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Application\Field;

class Base extends \ExampleCMS\Application\Responder implements \ExampleCMS\Contract\Field
{

    /**
     * @var string 
     */
    protected $templateType = 'fields';

    protected function getTemplateId()
    {
        $templatePath = [];

        $templatePath[] = $this->templateType;
        $templatePath[] = $this->metadata['component'];
        $templatePath[] = !isset($this->metadata['template']) ? 'view' : $this->metadata['template'];

        return $templatePath;
    }

    protected function getEmptyTemplatePath()
    {
        return array(
            $this->templateType,
            'empty',
            'view',
        );
    }

    protected function getDefaultData()
    {
        return [
            'name' => null,
            'value' => null,
            'id' => null,
        ];
    }

    public function execute($request)
    {
        $data = parent::execute($request);

        $model = $this->getModelByRequest($request);

        if (empty($data['label'])) {
            $data['label'] = $data['name'];
        }

        if ($model) {
            $data['value'] = $model->get($data['name']);
            $data['id'] = $model->get('id');
            $data['formName'] = $model->getModelName();
        }

        return $data;
    }

}
