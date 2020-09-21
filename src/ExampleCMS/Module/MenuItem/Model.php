<?php

namespace ExampleCMS\Module\MenuItem;

class Model extends \ExampleCMS\Model implements \ExampleCMS\Contract\Layer\View\Model
{

    use \ExampleCMS\Layer\View\Model;

    public function getRole()
    {
        return 'presentation';
    }

    protected function isActive($model)
    {
        if ($model->get('menuitem_id')) {
            if ($model->get('module') == $this->context->getModule()) {
                return false;
            }
            if ($model->get('route') != $this->router->get('name')) {
                return false;
            }
        } else {
            if ($model->get('module') != $this->context->getModule()) {
                return false;
            }
        }

        return true;
    }

    public function getClass()
    {
        if ($this->isActive($this)) {
            return 'active';
        }
    }

    public function getTargetLink()
    {
        return $this->getLinkByRoute($this->get('route'));
    }

    public function getName()
    {
        return $this->get('label');
    }

    public function getLinkByRoute($route)
    {
        return $this->router->make($route, $this->toArray());
    }

    public function checkAccessByRoute($route)
    {
        $route = $this->router->getRoute($route);
        $currentUser = $this->context->getUser();

        $operation = 'default';

        if (!empty($route['operation'])) {
            $operation = $route['operation'];
        }

        return $currentUser->hasAccess($this->get('module'), $operation);
    }
}
