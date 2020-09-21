<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Contract;

interface Bundle
{

    /**
     * @param string $model
     * @return \ExampleCMS\Contract\Model
     */
    public function getModel($model);

    /**
     * @param string $form
     * @return \ExampleCMS\Contract\Model\Form
     */
    public function getForm($form);

    /**
     * @param string $action
     * @return \ExampleCMS\Contract\Action
     */
    public function getAction($action);

    /**
     * @param string $view
     * @return \ExampleCMS\Contract\Responder\View
     */
    public function getView($view);

    /**
     * @param string $query
     * @return \ExampleCMS\Contract\Query
     */
    public function getQuery($query);

    /**
     * @return \ExampleCMS\Contract\Module
     */
    public function getModule();

    /**
     * @param string $bundle
     */
    public function setBundle($bundle);

    /**
     * @param string $layout
     * @return \ExampleCMS\Contract\Responder\Layout
     */
    public function getLayout($layout);

    /**
     * @param string $grid
     * @return \ExampleCMS\Contract\Responder\Grid
     */
    public function getGrid($grid);
}
