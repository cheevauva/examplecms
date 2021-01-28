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
        $request = $context->getAttribute('request');

        $context = parent::execute($context);
        $context['examplecms_timestart'] = $request->getAttribute('examplecms_timestart');

        return $context;
    }

}
