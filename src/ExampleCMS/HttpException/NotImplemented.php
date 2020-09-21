<?php

namespace ExampleCMS\HttpException;

class NotImplemented extends \ExampleCMS\HttpException
{

    protected $code = 501;
    protected $message = 'Not implemented';
}
