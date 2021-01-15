<?php

$onlyAutoloadStage = true;

require '../bootstrap.php';

interface ActionInterface
{

    /**
     * @return boolean
     */
    public function execute();

    /**
     * @param array $options
     */
    public function setOptions(array $options);
}

interface ActionFactoryInterface
{

    /**
     * @param string $id
     * @return ActionInterface
     */
    public function create($id);
}

interface ActionBusInterface
{

    /**
     * @param ActionInterface $action
     */
    public function add(ActionInterface $action);

    public function run();
}

class ActionSay implements ActionInterface
{

    /**
     * @var array 
     */
    protected $options;

    public function execute()
    {
        // echo $this->options['string'] . '<br/>';
    }

    public function setOptions(array $options)
    {
        $this->options = $options;
    }

}

class ActionFactory implements ActionFactoryInterface
{

    /**
     *
     * @var \Psr\Container\ContainerInterface 
     */
    public $container;

    public function create($id)
    {
        return $this->container->get($id);
    }

}

class ActionBus implements ActionBusInterface
{

    /**
     * @var ActionInterface[]
     */
    protected $actions;

    public function add(\ActionInterface $action)
    {
        $this->actions[] = $action;
    }

    public function run()
    {
        foreach ($this->actions as $action) {
            $action->execute();
        }
    }

}

class Application
{

    /**
     * @var ActionFactoryInterface
     */
    public $actionFactory;

    /**
     * @var ActionBusInterface
     */
    public $actionBus;

    /**
     * @param array $actions
     */
    public function run(array $actions)
    {
        foreach ($actions as $action) {
            $cmd = $this->actionFactory->create($action['action']);
            $cmd->setOptions($action['options']);

            $this->actionBus->add($cmd);
        }

        $this->actionBus->run();
    }

}

$map = [
    Application::class => [
        'actionBus' => '*' . ActionBus::class,
        'actionFactory' => ActionFactory::class,
    ],
    ActionFactory::class => [
        'container' => \ExampleCMS\Container::class,
    ],
];

$container = new \ExampleCMS\Container($map);

$start = microtime(true);

for ($x = 1; $x < 10000; $x++) {
    $container->get('Application')->run([
        [
            'action' => 'ActionSay',
            'options' => [
                'string' => 'Hello',
            ],
        ],
        [
            'action' => 'ActionSay',
            'options' => [
                'string' => 'world',
            ],
        ],
        [
            'action' => 'ActionSay',
            'options' => [
                'string' => '!',
            ],
        ],
    ]);
    $container->get('Application')->run([
        [
            'action' => 'ActionSay',
            'options' => [
                'string' => 'Hello',
            ],
        ],
        [
            'action' => 'ActionSay',
            'options' => [
                'string' => '!',
            ],
        ],
    ]);
}

var_dump(microtime(true) - $start);