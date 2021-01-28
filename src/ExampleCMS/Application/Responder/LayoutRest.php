<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Responder;

use ExampleCMS\Contract\Context;

class LayoutRest extends Layout
{

    protected $templateType = 'layouts';

    public function execute(Context $context)
    {
        $data = parent::execute($context);

        return $data;
    }

}
