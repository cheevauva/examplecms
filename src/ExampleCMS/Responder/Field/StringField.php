<?php

namespace ExampleCMS\Responder\Field;

class StringField extends Base
{

    public function getData($request)
    {
        $metadata = parent::getData($request);

        $metadata['value'] = $this->model->get($this->metadata['name']);
        $metadata['id'] = $this->model->get('id');
        
        if (empty($metadata['value']) && !empty($metadata['default'])) {
            $metadata['value'] = $metadata['default'];
        }

        return $metadata;
    }
}
