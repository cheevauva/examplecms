<?php

namespace ExampleCMS\HttpException;

class NotFound extends \ExampleCMS\HttpException
{

    protected $code = 404;
    protected $message = 'Page not found';
}
