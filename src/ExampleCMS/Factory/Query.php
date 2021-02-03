<?php

namespace ExampleCMS\Factory;

class Query extends Component implements \ExampleCMS\Contract\Factory\Query
{

    public function get($id, \ExampleCMS\Contract\Module $module)
    {
        /* @var $query \ExampleCMS\Contract\Application\Query */
        $query = parent::get('queries.' . $id, $module);
        $query->setModule($module);
        
        return $query;
    }

}
