<?php

namespace ExampleCMS\Contract;

interface GetterSetter extends Getter
{

    /**
     * @param string $name
     * @param mixed $value
     */
    public function set($name, $value);
}
