<?php

namespace ExampleCMS\HttpException;

class Forbidden extends \ExampleCMS\Exception\Http
{

    protected $code = 400;
    protected $message = 'Forbidden';
}
