<?php

namespace ExampleCMS\Application\Mapper;

class UserScopeDecodeMapper extends Mapper
{

    public function execute($data)
    {
        if (empty($this->metadata['map'])) {
            $this->metadata['map'] = [];
        }

        $map = $this->metadata['map'];
        $attributes = [];

        foreach ($map as $entityAttribute => $userScopeAttribute) {
            $value = null;

            if (isset($data[$userScopeAttribute])) {
                $value = $data[$userScopeAttribute];
            }

            $attributes[$entityAttribute] = $value;
        }

        return $attributes;
    }

}
