<?php

namespace ExampleCMS\Responder\View;

class Exception extends Basic
{

    public $application;

    public function getData($request)
    {
        $metadata = parent::getData($request);

        $exception = $request->getAttribute('exception');

        $metadata['message'] = '';

        if (!empty($exception)) {
            $metadata['message'] = $exception->getMessage();
        }

        return $metadata;
    }
}
