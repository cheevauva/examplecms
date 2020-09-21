<?php

namespace ExampleCMS\Module\Module\Query;

class All extends \ExampleCMS\Query\Config\Query
{

    public function fetchManyRaw()
    {
        $modules = $this->metadata->get(array(
            'modules'
        ));
        $preparedModules = array();

        foreach ($modules as $key => $module) {
            $preparedModule = $module;
            $preparedModule['id'] = $key;
            $preparedModules[] = $preparedModule;
        }

        return $preparedModules;
    }
}
