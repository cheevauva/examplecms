<?php

namespace ExampleCMS\Contract\Module;

interface Responder
{

    /**
     * @param string|array $column
     * @return \ExampleCMS\Contract\Application\Responder
     */
    public function column($column);

    /**
     * @param string|array $field
     * @return \ExampleCMS\Contract\Application\Responder
     */
    public function field($field);

    /**
     * @param string|array $grid
     * @return \ExampleCMS\Contract\Application\Responder
     */
    public function grid($grid);

    /**
     * @param string|array $row
     * @return \ExampleCMS\Contract\Application\Responder
     */
    public function row($row);

    /**
     * @param string|array $view
     * @return \ExampleCMS\Contract\Application\Responder
     */
    public function view($view);

    /**
     * @param string|array $layout
     * @return \ExampleCMS\Contract\Application\Responder
     */
    public function layout($layout);
}
