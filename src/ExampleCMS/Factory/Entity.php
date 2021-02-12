<?php

namespace ExampleCMS\Factory;

use ExampleCMS\Contract\Module;

class Entity extends Factory implements \ExampleCMS\Contract\Factory\Entity
{

    public function makeById($id, \ExampleCMS\Contract\Module $module)
    {
        $metadata = $this->metadata->get(['entities', $module->getName()]);

        if (is_null($metadata[$id])) {
            throw new \ExampleCMS\Exception\Metadata(sprintf('entity "%s" is not define', $id));
        }

        return $this->makeByMetadata($metadata[$id], $module);
    }

    public function makeByMetadata(array $meta, Module $module)
    {
        if (!isset($meta['component'])) {
            throw new \ExampleCMS\Exception\Metadata(sprintf('component "%s" is not define', $meta['component']));
        }

        return $this->builder->make($module->getComponentIdByAlias('entity.' . $meta['component']), [
            $module,
            $meta,
        ]);
    }

}
