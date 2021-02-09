<?php

namespace ExampleCMS;

class ComponentBuilder implements \ExampleCMS\Contract\ComponentBuilder
{

    protected $closure;

    public function make($id, $args = [])
    {
        $closure = $this->closure;
        
        return $closure($id, $args);
    }

    public function __invoke(callable $closure)
    {
        if ($this->closure) {
            throw new \ExampleCMS\Exception('closure already defined');
        }

        $this->closure = $closure;
    }

}
