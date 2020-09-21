<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Factory\Database;

class Table extends \ExampleCMS\Factory\Factory
{

    protected $tables = array();
    
    public function get($name)
    {
        if (!empty($this->tables[$name])) {
            return $this->tables[$name];
        }
        
        $metadata = $this->metadata->get(array(
            'tables',
            $name
        ));

        $componentName = 'ExampleCMS\\Database\\Table';
        
        if (!empty($metadata['component'])) {
            $componentName = $metadata['component'];
        }
        
        $component = $this->container->create($componentName);
        $component->setMetadata($metadata);
        $component->connectionFactory = $this->connectionFactory;
        
        $this->tables[$name] = $component;
        
        return $component;
    }
}
