<?php

namespace ExampleCMS;

class Container extends \PDIC\Container
{

    /**
     * @param string $id
     * @return object
     * @throws ExceptionNotFound
     * @throws Exception
     */
    public function get($id)
    {
        if (empty($id)) {
            throw new Exception('id must be defined');
        }

        $isLocal = $id[0] === static::LOCAL_PREFIX;
        $isGlobal = !$isLocal;

        if ($isGlobal) {
            if (isset($this->objects[$id])) {
                return $this->objects[$id];
            }
        } else {
            $id = substr($id, 1);
        }

        if (!class_exists($id, true)) {
            throw new ExceptionNotFound(sprintf('class "%s" not found', $id));
        }

        $object = new $id;

        if ($isGlobal) {
            $this->objects[$id] = $object;
        }

        $properties = $this->getPropertiesByClass($id);

        if ($object instanceof InterfaceUsePDICServiceLocator) {
            $object->setPDICServiceLocatory(new ServiceLocator($properties, $this));
        } else {
            $this->setPropertiesToObject($object, $properties);
        }

        if ($object instanceof InterfaceMediator) {
            $object = $object->get();
        }

        if ($isGlobal) {
            $this->objects[$id] = $object;
        }

        return $object;
    }

}
