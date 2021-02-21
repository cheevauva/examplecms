<?php

namespace ExampleCMS\Module\Installer\Query;

class FindDatabases extends FindById
{

    use CacheTrait;

    public function fetch(array $params = array())
    {
        $databases = $this->get('installer:databases', []);

        $entity = $this->entity('base');
        $entity->decode([
            'engine' => 'sqlite',
            'filename' => 'C:\Test.db',
        ]);

        $entity2 = $this->entity('base');
        $entity2->decode([
            'engine' => 'mysql',
            'host' => 'localhost',
            'username' => 'root',
            'password' => '123',
            'database' => 'examplecms',
        ]);

        $entityForm = $this->entity('database');
        $entityForm->pull($entity);

        $entityForm2 = $this->entity('database');
        $entityForm2->pull($entity2);

        $collection = new \ExampleCMS\Collection;
        $collection->add($entityForm);
        $collection->add($entityForm2);

        return new \ExampleCMS\Application\ResultSet\Collection($collection);
    }

}
