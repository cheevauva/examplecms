<?php

namespace ExampleCMS\Factory;

use ExampleCMS\Contract\Module;

class Responder extends Factory implements \ExampleCMS\Contract\Factory\Responder
{

    /**
     * @var \ExampleCMS\Contract\Factory\Component 
     */
    public $componentFactory;

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

        $component = $this->componentFactory->get($type . '.' . $metadata['component'], $module);
        $component->setMetadata($metadata);
        $component->setModule($module);

        return $component;
    }

}
