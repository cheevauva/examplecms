<?php

namespace ExampleCMS;

class Context implements \ExampleCMS\Contract\Context
{

    /**
     * @var \ExampleCMS\Contract\FormManager
     */
    public $formManager;
    
    /**
     *
     * @var \ExampleCMS\Contract\Request
     */
    public $request;

    /**
     * @var string
     */
    protected $module;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $action;

    /**
     * @var string
     */
    protected $form;

    /**
     * @var string
     */
    protected $layout;

    /**
     * @var string
     */
    protected $theme;

    public function getModel()
    {
        $query = $this->getQuery('find');
        $query->setParam('id', $this->id);

        return $query->fetchOne();
    }

    public function getStorage()
    {
        return $this->getModule()->getStorage();
    }

    public function getQuery($query)
    {
        return $this->getModule()->getQuery($query);
    }

    public function getQueryGroup($queryGroup)
    {
        return $this->getModule()->getQueryGroup($queryGroup);
    }

    /**
     * @deprecated
     */
    public function getRepository()
    {
        return $this->getModule()->getRepository();
    }

    public function getLayout()
    {
        return $this->getModule()->getLayout($this->layout);
    }

    public function getAction()
    {
        if (empty($this->action)) {
            return;
        }
        
        return $this->getModule()->getAction($this->action);
    }

    public function getForm()
    {
        return $this->formManager->getForm();
    }

    public function getModule()
    {
        return $this->getBundle()->getModule();
    }
    
    public function getTheme()
    {
        return $this->themeFactory->get($this->theme);
    }

    public function getUser()
    {
        $user = $this->bundleFactory->get('users')->getModel();
        $user->set('role', 'admin');

        return $user;
    }

    public function setContextByDefault()
    {
        $this->module = 'Default';
        $this->action = 'default';
        $this->id = null;
        $this->layout = 'default';
        $this->theme = 'default';
    }

    public function setContextFromRouter(\ExampleCMS\Contract\Router $router)
    {
        $this->module = $router->get('module');
        $this->action = $router->get('action');
        $this->form = $router->get('form');
        $this->id = $router->get('id');
        $this->layout = $router->get('layout');
        $this->theme = $router->get('theme');

        if (!$this->theme) {
            $this->theme = 'default';
        }

//        if (!$this->id) {
//            $this->id = $this->getStorage()->create();
//        }
    }

}
