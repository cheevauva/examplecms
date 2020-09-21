<?php

namespace ExampleCMS\Module\Role;

class Model extends \ExampleCMS\Model
{

    public function getAccess($user, $module, $action = 'read')
    {
        if ($this->get('name') === 'admin') {
            return 'all';
        }

        return $this->config->get(array(
            'roles',
            $this->get('name'),
            (string) $module,
            $action
        ));
    }
}
