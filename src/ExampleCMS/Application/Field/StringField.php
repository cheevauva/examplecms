<?php

namespace ExampleCMS\Application\Field;

class StringField extends Base
{

    public function execute($request)
    {
        $data = parent::execute($request);
       
        if (empty($data['value']) && !empty($data['default'])) {
            $data['value'] = $data['default'];
        }

        return $data;
    }

}
