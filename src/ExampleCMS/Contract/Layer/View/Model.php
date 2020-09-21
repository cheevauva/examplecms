<?php

namespace ExampleCMS\Contract\Layer\View;

interface Model
{

    public function getLink($name);

    public function checkRouteAccess($route);
}
