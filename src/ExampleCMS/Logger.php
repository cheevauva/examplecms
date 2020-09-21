<?php

namespace ExampleCMS;

class Logger implements \ExampleCMS\Contract\Container\Mediator
{

    public function get()
    {
        $name = $this->config->get('base.logger.name');
        $level = $this->config->get('base.logger.level');
        $filename = $this->filesystem->getBasePath() . $this->config->get('base.logger.path');
        $levels = \Monolog\Logger::getLevels();

        return new \Monolog\Logger($name, array(
            new \Monolog\Handler\StreamHandler($filename, $levels[$level])
        ));
    }
}
