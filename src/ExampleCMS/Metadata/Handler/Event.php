<?php

namespace ExampleCMS\Metadata\Handler;

class Event extends Basic
{

    public function setType($type)
    {
        parent::setType($type);

        $this->moduleHandler = new \ExampleCMS\Metadata\Handler\Basic;
        $this->moduleHandler->filesystem = $this->filesystem;
        $this->moduleHandler->setType('events');
        $this->moduleHandler->setRoute('metadata/events/modules/$1.php');
    }

    public function get(array $path)
    {
        $rawPath = $path;
        $level = array_shift($path);

        if ($level === 'modules') {
            return $this->moduleHandler->get($path);
        }

        parent::get($rawPath);
    }
}
