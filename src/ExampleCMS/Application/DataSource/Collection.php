<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\DataSource;

class Collection extends \ExampleCMS\DataSource
{

    /**
     * @return \ExampleCMS\Contract\Module
     */
    public $module;

    /**
     * @return \ExampleCMS\Contract\Model[]
     */
    public function fetch()
    {
        return $this->module->getQuery('all')->execute()->fetchMany();
    }

}
