<?php

namespace ExampleCMS;

class Application
{

    /**
     * @var array
     */
    protected $middleware = array();
    
    /**
     * @var \ExampleCMS\Contract\Metadata
     */
    public $metadata;
    
    /**
     * @var \ExampleCMS\Contract\Container
     */
    public $container;

    public function prepare()
    {
        $appName = $this->bootstrap->getAppName();

        $metadata = $this->metadata->get(array(
            'applications'
        ));

        $this->middleware = $metadata[$appName]['middleware'];
    }

    public function run($request, $response)
    {
        $middleware = $this->container->create('ExampleCMS\\Middleware');
        $middleware->setMiddleware($this->middleware);

        return $middleware->run($request, $response);
    }

}
