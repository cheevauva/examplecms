<?php

namespace ExampleCMS\Contract\Module\User;

use \ExampleCMS\Contract\Repository as IRepository;

interface Repository extends IRepository
{

    /**
     * @return \ExampleCMS\Contract\Model
     */
    public function getAuthUser();
}
