<?php

namespace ExampleCMS\Application\EntityMapper;

class UserScopeFromModelForm extends EntityMapper
{

    public function execute($data = null)
    {
        $result = [];

        $metadata = $this->entity->getMeta();
        $attributes = $this->entity->attributes();

        foreach ($metadata['map'] as $to => $from) {
            $result[$to] = $attributes[$from];
        }

        if (!empty($metadata['map_out'])) {
            foreach ($metadata['map_out'] as $to => $from) {
                $result[$to] = $attributes[$from];
            }
        }

        return $result;
    }

}
