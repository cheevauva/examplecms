<?php

namespace ExampleCMS;

use ExampleCMS\Contract\Repository as IRepository;
use ExampleCMS\Contract\Model as IModel;

class Repository implements IRepository
{

    public $module;

    /**
     * @param id $id
     * @return Model
     */
    public function find($id)
    {
        $query = $this->getQuery('find');
        $query->setId($id);

        return $query->getIterator()->current();
    }

    public function updateOne($query, $model)
    {
        $query->setModel($model);

        $model->fromArray($query->fetch());
        $this->setEntity($model);

        return $model;
    }

    public function add(IModel $model)
    {
        if ($model->get('id')) {
            return $this->update($model);
        }

        return $this->updateOne('create', $model);
    }

    public function addAll(array $models)
    {
        $query = $this->repository->getQuery('addAll');
        $query->setModels($models);
        $query->execute();

        return $this->updateMany('create', $models);
    }

    public function remove(IModel $model)
    {
        $this->updateOne('delete', $model);
        $this->removeEntity($model);
    }

    public function update(IModel $model)
    {
        return $this->updateOne('update', $model);
    }

    /**
     * @param string $query
     * @return \ExampleCMS\Contract\Query
     */
    public function getQuery($query)
    {
        return $this->module->getQuery($query);
    }

    public function getSize()
    {
        return $this->getQuery('count')->execute()->fetch();
    }

    public function all()
    {
        return $this->getQuery('all');
    }

    public function findBy(array $criteria)
    {
        $query = $this->getQuery('find');
        $query->setCriteria($criteria);

        return $query;
    }

}
