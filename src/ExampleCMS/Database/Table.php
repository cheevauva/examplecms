<?php

namespace ExampleCMS\Database;

class Table
{

    /**
     * @var array
     */
    protected $metadata;

    /**
     * @var \ExampleCMS\Contract\Factory\Database\Connection
     */
    public $connectionFactory;

    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
    }

    public function getConnection()
    {
        return $this->connectionFactory->get($this->metadata['connection']);
    }
    
    public function get($name)
    {
        if (!isset($this->metadata[$name])) {
            throw new \InvalidArgumentException(sprintf('"%s" is not defined in table', $name));
        }
        
        return $this->metadata[$name];
    }
}
