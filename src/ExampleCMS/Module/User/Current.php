<?php

namespace ExampleCMS\Module\User;

class Current implements \ExampleCMS\Contract\Container\Mediator
{
    
    public $session;
    
    public $module;

    public function get()
    {
        if ($this->session->get('user_id')) {
            $query = $this->module->getQuery('find');
            $query->setParam('id', $this->session->get('user_id'));

            return $query->fetchOne();
        }

        $user = $this->module->getModel();
        $user->fromArray(array(
            'id' => '-1',
            'username' => 'guest',
            'role' => 'guest',
        ));
        $this->module->getStorage()->setEntity($user);

        return $user;
    }

}
