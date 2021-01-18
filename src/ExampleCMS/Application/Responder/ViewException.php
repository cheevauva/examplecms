<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Responder;

class ViewException extends View
{

    public $application;

    public function execute($context)
    {
        $metadata = parent::execute($context);

        $exception = $context['exception'];

        $metadata['message'] = '';

        if (!empty($exception)) {
            $metadata['message'] = $exception->getMessage();
            $metadata['trace'] = $exception->getTraceAsString();
        }

        return $metadata;
    }

}
