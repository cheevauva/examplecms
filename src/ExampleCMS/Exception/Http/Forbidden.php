<?php

namespace ExampleCMS\HttpException;

class Forbidden extends \ExampleCMS\HttpException
{

    protected $code = 400;
    protected $message = 'Forbidden';
}
