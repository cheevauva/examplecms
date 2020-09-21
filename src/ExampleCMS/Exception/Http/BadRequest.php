<?php

namespace ExampleCMS\Exception\Http;

class BadRequest extends \ExampleCMS\Exception\Http
{

    protected $code = 400;
    protected $message = 'Bad request';
}
