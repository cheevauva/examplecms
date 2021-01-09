<?php

namespace ExampleCMS\Contract\Application;

interface Responder
{
    public function execute(array $context);
}