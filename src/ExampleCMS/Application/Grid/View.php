<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Application\Grid;

class View extends Basic
{

    protected function getModels()
    {
        return $this->module->getDataSource($this->metadata['datasource'])->fetchMany();
    }

    public function getData($request)
    {
        $models = $this->getModels();

        $metadata = parent::getData();
        $metadata['rows'] = array();

        foreach ($this->metadata['rows'] as $row) {
            if (empty($row['iterate'])) {
                $rowObject = $this->prepareRow($row);
                $rowObject->model = $this->module->getModel();

                $metadata['rows'][] = $rowObject->getData($request);
                continue;
            }

            foreach ($models as $model) {
                $rowObject = $this->prepareRow($row);
                $rowObject->model = $model;

                $metadata['rows'][] = $rowObject->getData($request);
            }
        }

        return $metadata;
    }

}
