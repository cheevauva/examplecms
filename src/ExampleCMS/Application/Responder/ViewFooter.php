<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Responder;

class ViewFooter extends View
{

    public function execute(array $context)
    {
        $request = $context['request'];

        $context = parent::execute($context);
        $context['examplecms_timestart'] = $request->getAttribute('examplecms_timestart');

        return $context;
    }

}
