<?php

namespace ExampleCMS\Application\Field;

class Link extends Field
{

    protected $type = 'link';

    public function execute($context)
    {
        $context = parent::execute($context);
        
        $context['label'] = $context['name'];
        $context['url'] = '';

        if (!empty($context['modelForms'][$context['form']])) {
            /* @var $model \ExampleCMS\Contract\Application\Model */
            $model = $context['modelForms'][$context['form']];

            $context['url'] = $context['request']->getAttribute('router')->make($context['route'], array(
                'module' => $model->getModule()->getModule(),
                'id' => $model->get('id'),
            ));

            if (empty($context['use_label'])) {
                $context['label'] = $model->get($context['label']);
            }
        }


        return $context;
    }

}
