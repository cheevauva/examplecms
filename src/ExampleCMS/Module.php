<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS;

class Module implements \ExampleCMS\Contract\Module
{

    /**
     * @var \ExampleCMS\Contract\Bundle
     */
    protected $bundle;
    protected $responder;

    /**
     * @var string
     */
    protected $module;

    /**
     * @var \ExampleCMS\Contract\Metadata
     */
    public $metadata;

    /**
     * @var \ExampleCMS\Contract\Factory\Bundle
     */
    public $bundleFactory;

    public function init($module)
    {
        $this->data = $this->metadata->get(['modules', $module]);
        $this->module = $module;
        $this->bundle = $this->bundleFactory->get($module);
    }

    public function getBundle()
    {
        return $this->bundle;
    }

    public function __toString()
    {
        return $this->module;
    }

    public function model($modelType = 'base')
    {
        return $this->bundle->getModel($modelType);
    }

    public function storage()
    {
        return $this->bundle->getStorage();
    }

    public function dataSource($dataSource)
    {
        return $this->bundle->getDataSource($dataSource);
    }

    public function action($action)
    {
        return $this->bundle->getAction($action);
    }

    public function query($query)
    {
        return $this->bundle->getQuery($query);
    }

    public function responder()
    {
        if (!$this->responder) {
            $this->responder = new \ExampleCMS\Responder\Responder($this);
        }

        return $this->responder;
    }

    public function theme($theme)
    {
        $th = new \ExampleCMS\Application\Theme\Basic;
        $th->metadata = $this->metadata;
        $th->setModule($this);
        $th->setTheme($theme);

        return $th;
    }

}
