<?php

namespace ExampleCMS\HttpException;

class BadRequest extends \ExampleCMS\HttpException
{

    protected $code = 400;
    protected $message = 'Bad request';
}
