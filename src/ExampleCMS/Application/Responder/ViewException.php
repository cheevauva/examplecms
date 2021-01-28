<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Responder;

use ExampleCMS\Contract\Context;

class ViewException extends View
{

    public $application;

    public function execute(Context $context)
    {
        $metadata = parent::execute($context);

        $exception = $context->getAttribute('exception');

        $metadata['message'] = '';

        if (!empty($exception)) {
            $metadata['message'] = $exception->getMessage();
            $metadata['trace'] = $exception->getTraceAsString();
        }

        return $metadata;
    }

}
