<?php

namespace ExampleCMS\Module\User;

class Model extends \ExampleCMS\Model implements \ExampleCMS\Contract\User\Domain
{

    use \ExampleCMS\Layer\View\Model;
    public $modelFactory;
    protected $userRole;

    public function hasAccess($module, $action)
    {
        return $this->getRole()->getAccess($this, $module, $action);
    }

    public function getRole()
    {
        if ($this->userRole) {
            return $this->userRole;
        }

        $this->userRole = $this->modelFactory->getModel();
        $this->userRole->fromArray(array(
            'name' => $this->get('role'),
        ));


        return $this->userRole;
    }
}
