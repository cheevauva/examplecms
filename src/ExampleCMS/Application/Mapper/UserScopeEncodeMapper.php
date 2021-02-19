<?php

namespace ExampleCMS\Application\Mapper;

class UserScopeEncodeMapper extends Mapper
{

    public function execute($data)
    {
        $result = [];

        $map = $this->metadata['map'] ?? array_keys($data);

        foreach ($map as $entityAttribute => $userScopeAttribute) {
            $result[$userScopeAttribute] = $data[$entityAttribute] ?? null;
        }

        return $result;
    }

}
