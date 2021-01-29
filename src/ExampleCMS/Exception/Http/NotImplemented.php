<?php

namespace ExampleCMS\HttpException;

class NotImplemented extends \ExampleCMS\Exception\Http
{

    protected $code = 501;
    protected $message = 'Not implemented';

}
