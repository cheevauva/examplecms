<?php

namespace ExampleCMS\Contract\Application;

interface EntityMapper
{

    const FROM = 'from';
    const TO = 'to';

    public function execute($data = null);
}
