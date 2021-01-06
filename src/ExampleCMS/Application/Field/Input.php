<?php

namespace ExampleCMS\Application\Field;

class Input extends Field
{

    public function execute($context)
    {
        $data = parent::execute($context);

        if (!empty($context['formattedForms'][$context['form']])) {
            $form = $context['formattedForms'][$context['form']];
            $model = $context['modelForms'][$context['form']];

            $data['name'] = $this->metadata['name'];
            $data['value'] = $form[$this->metadata['name']];
           // $data['id'] = $form['id'];
            $data['formName'] = $model->getModelName();
        }

        return $data;
    }

}
