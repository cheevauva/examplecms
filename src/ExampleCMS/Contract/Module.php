<?php

namespace ExampleCMS\Contract;

interface Module
{

    /**
     * @return \ExampleCMS\Contract\Model
     */
    public function model($model);

    /**
     * @return \ExampleCMS\Contract\Action
     */
    public function action($action);

    /**
     * @return \ExampleCMS\Contract\Query
     */
    public function query($query);
}
