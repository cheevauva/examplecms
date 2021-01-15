<?php

namespace ExampleCMS\Contract\Application;

interface Mapper
{

    const FROM = 'from';
    const TO = 'to';
    
    public function execute(array $params);

}
