<?php

namespace ExampleCMS\Model;

class Form extends \ExampleCMS\Model implements \ExampleCMS\Contract\Model\Form
{

    /**
     * @var \ExampleCMS\Contract\Router
     */
    public $router;

    /**
     * @var array
     */
    protected $metadata;

    /**
     * @var string
     */
    protected $state;

    /**
     * @var string
     */
    protected $stateReason;
    protected $domain;

    /**
     * @var string
     */
    protected $token;

    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->metadata['method'];
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function setStateReason($stateReason)
    {
        $this->stateReason = $stateReason;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getStateReason()
    {
        return $this->stateReason;
    }

    public function getDomain()
    {
        if ($this->domain) {
            return $this->domain;
        }

        if (!empty($this->metadata['datasource'])) {
            $this->domain = $this->module->dataSource($this->metadata['datasource'])->fetch();
        }

        return $this->domain;
    }

    public function isValid()
    {
        if ($this->state === 'broken') {
            return false;
        }

        return true;
    }

    public function getAction()
    {
        $params = array(
            'module' => $this->get('module'),
        );

        if ($this->getDomain()) {
            $params['id'] = $this->getDomain()->get('id');
        }

        return $this->router->generate($this->metadata['route'], $params);
    }

    /**
     * @param array $metadata
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
        $this->modelName = $metadata['name'];
    }

}
