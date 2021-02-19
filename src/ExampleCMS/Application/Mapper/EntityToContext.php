<?php

namespace ExampleCMS\Application\Mapper;

class EntityToContext extends Mapper
{

    public function execute($data)
    {
        /* @var $context \ExampleCMS\Contract\Context */
        $context = $data['context'];
        $map = $this->metadata['map'] ?? [];
        $entityAttributes = $data['attributes'] ?? [];

        foreach ($map as $entityAttribute => $contextAttribute) {
            $context = $context->withAttribute($contextAttribute, $entityAttributes[$entityAttribute] ?? null);
        }

        return $context;
    }

}
