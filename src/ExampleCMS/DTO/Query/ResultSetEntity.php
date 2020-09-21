<?php

namespace ExampleCMS\DTO\Query;

class ResultSetEntity extends ResultSet
{

    /**
     * @var \ExampleCMS\Contract\Bundle
     */
    public $bundle;

    protected function rows2models(array $rows = array())
    {
        $storage = $this->bundle->getStorage();
        $models = array();

        foreach ($rows as $row) {
            $model = $storage->getEntity($row);

            if (!$model) {
                $model = $storage->newEntity($row);
                $model->fromArray($row);
                $storage->setEntity($model);
            }

            $models[] = $model;
        }

        return $models;
    }

    public function fetchMany()
    {
        return $this->rows2models($this->rows);
    }

    public function fetchOne()
    {
        return reset($this->rows2models($this->rows));
    }

}
