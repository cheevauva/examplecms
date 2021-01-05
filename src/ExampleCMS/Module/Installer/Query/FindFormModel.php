<?php

namespace ExampleCMS\Module\Installer\Query;

class FindFormModel
{

    const REQUEST = 'request';
    const FORM = 'form';

    /**
     *
     * @var \ExampleCMS\Module 
     */
    protected $module;
    public $cacheFactory;

    public function fetch(array $params = [])
    {
        $request = $params[static::REQUEST];
        $modelForms = $request->getAttribute('modelForms');

        if (empty($params[static::FORM]) && count($modelForms) === 1) {
            return reset($modelForms);
        }

        return $modelForms[$params[static::FORM]];
    }

    public function setModule($module): void
    {
        $this->module = $module;
    }

}
