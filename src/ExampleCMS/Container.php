<?php

namespace ExampleCMS;

class Container extends \PDIC\Container
{

    const VARIABLE_PREFIX = '@';

    /**
     * @param string $id
     * @return object
     * @throws ExceptionNotFound
     * @throws Exception
     */
    public function get($id)
    {
        return $this->fetch('*' . $id);
    }

    /**
     * @param string $id
     * @return object
     * @throws ExceptionNotFound
     * @throws Exception
     */
    protected function fetch($id)
    {
        if (empty($id)) {
            throw new Exception('id must be defined');
        }

        $isLocal = $id[0] === static::LOCAL_PREFIX;
        $isGlobal = !$isLocal;
        $isVariable = $id[0] === static::VARIABLE_PREFIX;

        if ($isVariable || $isLocal) {
            $id = substr($id, 1);
        }

        if ($isGlobal || $isVariable) {
            if (isset($this->objects[$id])) {
                return $this->objects[$id];
            }
        }

        if ($isVariable) {
            throw new ExceptionNotFound(sprintf('variable "%s" not found', $id));
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

    /**
     * @param object $object
     * @param array $properties
     * @throws Exception
     */
    protected function setPropertiesToObject($object, array $properties)
    {
        try {
            $reflecitonClass = new \ReflectionClass($object);

            foreach ($properties as $property => $class) {
                try {
                    $reflectionProperty = $reflecitonClass->getProperty($property);
                } catch (\ReflectionException $ex) {
                    throw new \PDIC\Exception(get_class($object) . ': ' . $ex->getMessage());
                }
                
                $value = $this->fetch($class);

                if ($reflectionProperty->isPublic()) {
                    $reflectionProperty->setValue($object, $value);
                } else {
                    $reflectionProperty->setAccessible(true);
                    $reflectionProperty->setValue($object, $value);
                    $reflectionProperty->setAccessible(false);
                }
            }
        } catch (Exception $e) {
            $message = 'For class (' . get_class($object) . '), property (' . $property . '): ';
            $message .= $e->getMessage();

            throw new Exception($message);
        }
    }

}
