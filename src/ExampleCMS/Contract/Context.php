<?php

namespace ExampleCMS\Contract;

interface Context
{

    /**
     * @return string
     */
    public function getModule();

    /**
     * @return Form
     */
    public function getForm();

    /**
     * @return Action
     */
    public function getAction();

    /**
     * @return View
     */
    public function getLayout();

    /**
     * @return Repository
     */
    public function getRepository();

    /**
     * @return Model
     */
    public function getModel();
}
