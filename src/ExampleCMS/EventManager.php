<?php

namespace ExampleCMS;

class EventManager implements \ExampleCMS\Contract\EventManager
{

    /**
     * @var  \ExampleCMS\Contract\Container
     */
    public $container;

    /**
     * @var \ExampleCMS\Contract\Metadata
     */
    public $metadata;

    public function notify($object, $event)
    {
        $path = $this->getPath($object);
        $path[] = $event;

        $events = $this->metadata->get($path);

        if (empty($events)) {
            return;
        }

        foreach ($events as $event) {
            $this->container->get($event['object'])->{$event['method']}($object);
        }
    }

    protected function getPath($object)
    {
        $path = array('events');

        if ($object instanceof \ExampleCMS\Contract\Module) {
            $path[] = 'modules';
            $path[] = $object->getModule();

            return $path;
        }

        if ($object instanceof \ExampleCMS\Contract\Application) {
            $path[] = 'application';

            return $path;
        }
    }
}
