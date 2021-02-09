<?php

namespace ExampleCMS;

class Builder implements \ExampleCMS\Contract\Builder
{

    protected $closure;

    public function make($id, array $args = [])
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
