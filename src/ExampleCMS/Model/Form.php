<?php

namespace ExampleCMS\Model;

class Form extends \ExampleCMS\Model implements \ExampleCMS\Contract\Model\Form
{

    public function bindTo(\ExampleCMS\Model $model)
    {
        foreach ($this->attributes as $attribute => $value) {
            $model->set($attribute, $value);
        }
    }
    
    public function bindFrom(\ExampleCMS\Model $model)
    {
        $this->attributes = $model->toArray();
    }

}
