<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\DataSource;

class ContextModel extends \ExampleCMS\DataSource
{

    /**
     *
     * @var \ExampleCMS\Contract\Context
     */
    public $context;

    /**
     * @return \ExampleCMS\Contract\Model[]
     */
    public function fetch()
    {
        return array(
            $this->context->getModel()
        );
    }

}
