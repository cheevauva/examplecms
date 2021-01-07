<?php

namespace ExampleCMS\Application\Field;

class Link extends Field
{

    protected $type = 'link';

    public function execute($context)
    {
        $metadata = parent::getData($context);

        $metadata['label'] = $metadata['name'];
        $metadata['url'] = $context['request']->getAttribute('router')->make($metadata['route'], array(
            'module' => $this->getModule(),
            'id' => $this->get('id'),
        ));

        if (empty($metadata['use_label'])) {
            $metadata['label'] = $this->model->get($metadata['label']);
        }

        return $metadata;
    }

}
