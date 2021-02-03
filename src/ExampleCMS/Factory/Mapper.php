<?php

namespace ExampleCMS\Factory;

class Mapper extends Component implements \ExampleCMS\Contract\Factory\Mapper
{

    public function get($id, \ExampleCMS\Contract\Module $module)
    {
        /* @var $mapper \ExampleCMS\Contract\Application\Mapper */
        $mapper = parent::get('mappers.' . $id, $module);
        //$mapper->setModule($module);

        return $mapper;
    }

}
