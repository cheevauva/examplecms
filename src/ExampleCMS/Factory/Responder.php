<?php

namespace ExampleCMS\Factory;

use ExampleCMS\Contract\Module;

class Responder extends Factory implements \ExampleCMS\Contract\Factory\Responder
{

    public function get(Module $module, $type, $name): \ExampleCMS\Contract\Responder
    {
        $metadata = $name;

        if (is_string($name)) {
            $responderMetadata = $this->metadata->get(['responders', ucfirst($type), $module->getName()]);

            $metadata = $responderMetadata[$name];
        }

        if (empty($metadata['component'])) {
            throw new \ExampleCMS\Exception\Metadata(sprintf('var "component" for "%s" is not define in responder "%s" for module "%s"', $name, $type, $module->getName()));
        }

        return $this->builder->make($module->getComponentIdByAlias($type . '.' . $metadata['component']), [
            $module,
            $metadata,
        ]);
    }

    public function getByMeta(Module $module, $meta): \ExampleCMS\Contract\Responder
    {
        $type = $meta['type'];
        $name = $meta['component'];

        unset($meta['type'], $meta['component']);

        $metadata = $name;

        if (is_string($name)) {
            $responderMetadata = $this->metadata->get(['responders', ucfirst($type), $module->getName()]);

            $metadata = $responderMetadata[$name];
        }

        if (empty($metadata['component'])) {
            throw new \ExampleCMS\Exception\Metadata(sprintf('var "component" for "%s" is not define in responder "%s" for module "%s"', $name, $type, $module->getName()));
        }

        $metadata['extra'] = $meta;

        return $this->builder->make($module->getComponentIdByAlias($type . '.' . $metadata['component']), [
            $module,
            $metadata,
        ]);
    }

}
