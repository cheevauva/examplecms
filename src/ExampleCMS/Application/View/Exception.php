<?php

namespace ExampleCMS\Application\View;

class Exception extends Basic
{

    public $application;

    public function execute($request)
    {
        $metadata = parent::execute($request);

        $exception = $request->getAttribute('exception');

        $metadata['message'] = '';

        if (!empty($exception)) {
            $metadata['message'] = $exception->getMessage();
        }

        return $metadata;
    }

}
