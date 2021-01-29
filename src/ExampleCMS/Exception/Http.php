<?php

namespace ExampleCMS\Exception;

abstract class Http extends \Exception
{

    public $request;
    protected $message;

    public static function withRequest($request)
    {
        $exception = new static;
        $exception->request = $request;

        return $exception;
    }

    public static function withRequestAndMessage($request, $message)
    {
        $exception = new static($message);
        $exception->request = $request;

        return $exception;
    }

}
