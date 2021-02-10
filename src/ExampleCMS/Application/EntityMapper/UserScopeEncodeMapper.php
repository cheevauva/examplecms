<?php

namespace ExampleCMS\Application\EntityMapper;

class UserScopeEncodeMapper extends EntityMapper
{

    public function execute($data = null)
    {
        $result = [];

        $metadata = $this->entity->getMeta();
        $attributes = $this->entity->attributes();

        foreach ($metadata['map'] as $to => $from) {
            $result[$to] = $attributes[$from];
        }

        if (!empty($metadata['map_encode'])) {
            foreach ($metadata['map_encode'] as $to => $from) {
                $result[$to] = $attributes[$from];
            }
        }

        return $result;
    }

}
