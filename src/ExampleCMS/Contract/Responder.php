<?php

namespace ExampleCMS\Contract;

interface Responder
{
    public function execute(array $context);
}