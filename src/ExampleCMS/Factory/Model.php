<?php

namespace ExampleCMS\Factory;

class Model extends Component implements \ExampleCMS\Contract\Factory\Model
{

    public function get($id, \ExampleCMS\Contract\Module $module)
    {
        $metadata = $id;

        if (is_string($id)) {
            $metadata = $this->metadata->get(['models', $module->getName()]);

            if (is_null($metadata[$id])) {
                throw new \ExampleCMS\Exception\Metadata(sprintf('model "%s" is not define', $id));
            }

            if (!isset($metadata[$id]['component'])) {
                throw new \ExampleCMS\Exception\Metadata(sprintf('component for "%s" is not define', $id));
            }

            $metadata = $metadata[$id];
        }

        $model = parent::get('models.' . $metadata['component'], $module);
        $model->setMetadata($metadata);
        $model->setModule($module);

        return $model;
    }

}
