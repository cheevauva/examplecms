<?php

namespace ExampleCMS\Module\Configuration\Query;

class Find extends \ExampleCMS\Query\Query
{

    public function fetchOneRaw()
    {
        $base = $this->config->get('base');
        $base['id'] = 1;
        
        
        return $base;
    }

    public function fetchManyRaw()
    {
        return array(
            $this->fetchOneRaw(),
        );
    }

}
