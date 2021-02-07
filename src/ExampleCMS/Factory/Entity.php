<?php

namespace ExampleCMS\Factory;

class Entity extends Component implements \ExampleCMS\Contract\Factory\Entity
{

    public function get($id, \ExampleCMS\Contract\Module $module)
    {
        $meta = $id;

        if (is_string($id)) {
            $meta = $this->metadata->get(['entities', $module->getName()]);
            
            if (is_null($meta[$id])) {
                throw new \ExampleCMS\Exception\Metadata(sprintf('entity "%s" is not define', $id));
            }

            if (!isset($meta[$id]['component'])) {
                throw new \ExampleCMS\Exception\Metadata(sprintf('component for "%s" is not define', $id));
            }

            $meta = $meta[$id];
        }

        /* @var $model \ExampleCMS\Contract\Application\Entity */
        $model = parent::get('entity.' . $meta['component'], $module);
        $model->setMeta($meta);
        $model->setModule($module);

        return $model;
    }

}
