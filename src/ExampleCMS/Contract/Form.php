<?php

namespace ExampleCMS\Contract;

interface Form
{

    /**
     * @param string $from
     * @param GetterSetter $to
     */
    public function bind(Getter $from, GetterSetter $to);

    /**
     * @return bool
     */
    public function isValid();
}
