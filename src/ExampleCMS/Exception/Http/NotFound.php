<?php

namespace ExampleCMS\Exception\Http;

class NotFound extends \ExampleCMS\Exception\Http
{

    protected $code = 404;
    protected $message = 'Page not found';

}
