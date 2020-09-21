<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS;

class Container implements \Psr\Container\ContainerInterface
{

    /**
     * @var array
     */
    protected $objects;

    /**
     * @var array
     */
    protected $injections = array();

    /**
     * @param array $injections
     * @param array $objects
     */
    public function __construct(array $injections, array $objects = array())
    {
        $this->injections = $injections;
        $this->objects = $objects;
        $this->objects[get_class($this)] = $this;
    }
    
    /**
     * @param string $className
     * @return object
     * @throws Exception
     */
    public function create($className)
    {
        return $this->get('*' . $className);
    }
    
    /**
     * @param string $id
     * @return object
     * @throws Exception
     */
    public function get($id)
    {
        if (!$id) {
            throw new Exception('class is required');
        }
        
        $share = $id[0] !== '*';

        if ($share) {
            if (isset($this->objects[$id])) {
                return $this->objects[$id];
            }
        } else {
            $id = substr($id, 1);
        }

        if (!class_exists($id, true)) {
            throw new Exception(sprintf('class %s not found', $id));
        }

        $object = new $id;

        if ($share) {
            $this->objects[$id] = $object;
        }

        $properties = $this->getPropertiesByClass($id);

        if ($object instanceof Contract\Container\UseServiceLocator) {
            $object->setContainer(new Container\ServiceLocator($properties, $this));
        } else {
            $this->setPropertiesToObject($object, $properties);
        }

        if ($object instanceof Contract\Container\Mediator) {
            $object = $object->get();
        }

        if ($share) {
            $this->objects[$id] = $object;
        }

        return $object;
    }

    /**
     * @param string $class
     * @return array
     */
    protected function getPropertiesByClass($class)
    {
        $classes = $this->getTraits($class);
        $classes += class_parents($class);
        $classes[] = $class;

        $properties = array();

        foreach ($classes as $class) {
            if (empty($this->injections[$class])) {
                continue;
            }

            foreach ($this->injections[$class] as $key => $value) {
                $properties[$key] = $value;
            }
        }

        return $properties;
    }

    /**
     * @param object $object
     * @param array $properties
     * @throws Exception
     */
    protected function setPropertiesToObject($object, array $properties)
    {
        try {
            foreach ($properties as $property => $class) {
                $object->{$property} = $this->get($class);
            }
        } catch (Container\Exception $e) {
            $message = 'For class (' . get_class($object) . '), property (' . $property . '): ';
            $message .= $e->getMessage();

            throw new Exception($message);
        }
    }

    /**
     * @param string $class
     * @return array
     */
    protected function getTraits($class)
    {
        $traits = array();

        do {
            $traits += class_uses($class);
        } while ($class = get_parent_class($class));

        foreach ($traits as $trait => $same) {
            $traits += $this->getTraits($trait);
        }

        return array_unique($traits);
    }

    public function __destruct()
    {
        //echo '<pre>' . print_r(array_keys($this->objects), 1) . '</pre>';
    }

    public function has($id)
    {
        
    }

}
