<?php

namespace ExampleCMS\Contract;

interface Session extends GetterSetter
{

    /**
     * @return bool
     */
    public function commit();
}
