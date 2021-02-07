<?php

namespace ExampleCMS\Application\Mapper;

class UserScopeToModelForm implements \ExampleCMS\Contract\Application\Mapper
{

    public function execute(array $params)
    {
        /** @var \ExampleCMS\Contract\Application\Entity $model */
        $model = $params[static::TO];
        $metadata = $model->getMeta();

        $forms = $params[static::FROM];
        $form = isset($forms[$metadata['name']]) ? $forms[$metadata['name']] : [];

        if (empty($metadata['map'])) {
            $metadata['map'] = [];
        }

        $map = $metadata['map'];
        $data = [];

        foreach ($map as $from => $to) {
            $value = null;

            if (isset($form[$from])) {
                $value = $form[$from];
            }

            $data[$to] = $value;
        }

        $model->fromArray($data);
    }

}
