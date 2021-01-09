<?php

namespace ExampleCMS\Application\Mapper;

class UserScopeFromModelForm implements \ExampleCMS\Contract\Application\Mapper
{

    public function execute($params)
    {
        $data = $params[static::TO];

        /** @var \ExampleCMS\Contract\Model $model */
        $model = $params[static::FROM];
        $metadata = $model->getMetadata();

        foreach ($metadata['map'] as $to => $from) {
            $value = null;

            if ($model->get($from)) {
                $value = $model->get($from);
            }

            $data[$to] = $value;
        }


        if (!empty($metadata['map_out'])) {
            foreach ($metadata['map_out'] as $to => $from) {
                $value = null;

                if ($model->get($from)) {
                    $value = $model->get($from);
                }

                $data[$to] = $value;
            }
        }
    }

}
