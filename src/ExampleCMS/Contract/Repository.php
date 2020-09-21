<?php

namespace ExampleCMS\Contract;

interface Repository
{
    /**
     * @param string $id
     * @return Model
     */
    public function find($id);
    
    /**
     * @param Model $model
     */
    public function remove(Model $model);
    
    /**
     * @param Model $model
     */
    public function update(Model $model);

    /**
     * @param Model $model
     */
    public function add(Model $model);
}
