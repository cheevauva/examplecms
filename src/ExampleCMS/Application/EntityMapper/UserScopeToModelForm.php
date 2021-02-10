<?php

namespace ExampleCMS\Application\EntityMapper;

class UserScopeToModelForm extends EntityMapper
{

    public function execute($data = null)
    {
        $metadata = $this->entity->getMeta();

        $forms = $data;
        $form = isset($forms[$metadata['name']]) ? $forms[$metadata['name']] : [];

        if (empty($metadata['map'])) {
            $metadata['map'] = [];
        }

        $map = $metadata['map'];
        $attributes = [];

        foreach ($map as $from => $to) {
            $value = null;

            if (isset($form[$from])) {
                $value = $form[$from];
            }

            $attributes[$to] = $value;
        }

        $this->entity->pull($attributes);
    }

}
