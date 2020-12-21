<?php

namespace ExampleCMS\Module\Installer\DataSource;

class InstallerModel extends \ExampleCMS\DataSource
{

    public function fetch()
    {
//        var_dump(get_class($this->module->model('base')));
//        die;
        return $this->module->model('base');
    }

}
