<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Responder;

use ExampleCMS\Contract\Context;

class ViewList extends View
{

    public function execute(Context $context)
    {
        $data = parent::execute($context);
        return $data;
    }

}
