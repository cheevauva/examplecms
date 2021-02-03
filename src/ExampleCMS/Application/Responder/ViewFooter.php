<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Responder;

use ExampleCMS\Contract\Context;

class ViewFooter extends View
{

    public function execute(Context $context)
    {
        $data = parent::execute($context);
        $data['examplecms_timestart'] = $context->getAttribute('examplecms_timestart');

        return $data;
    }

}
