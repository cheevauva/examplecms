<?php

namespace ExampleCMS\Exception\Http;

class ServerError extends \ExampleCMS\Exception\Http
{

    protected $code = 500;
    protected $message = 'Server error';
}
