<?php

namespace ExampleCMS\Cache\Adapter;

class Memcached extends Adapter
{

    /**
     * @var \Memcached 
     */
    protected $memcached;

    public function setOptions(array $options)
    {
        parent::setOptions($options);

        $this->configure();
    }

    protected function configure()
    {
        $this->memcached = new \Memcached();

        foreach ($this->options['servers'] as $server) {
            $weight = 0;

            if (!empty($server['weight'])) {
                $weight = $server['weight'];
            }

            $this->memcached->addServer($server['host'], $server['port'], $weight);
        }
    }

    public function get($key)
    {
        return $this->memcached->get($key);
    }

    public function set($key, $value)
    {
        $this->memcached->set($key, $value);
    }

}
