<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Application\Grid;

class View extends Grid
{

    protected function getModelsByRequest($request)
    {
        $models = [];

        $all = $this->module->query('all');
        $all->fetch([
            $all::LIMIT => 10,
            $all::OFFSET => $request->getAttribute('offset'),
        ])->models($models);

        return $models;
    }

    public function execute($request)
    {
        $models = $this->getModelsByRequest($request);
        $model = $this->getModelByRequest($request);

        $data = parent::execute();
        $data['rows'] = [];

        foreach ($this->metadata['rows'] as $meta) {
            $items = [];

            if (empty($meta['iterate'])) {
                $items[] = $model;
            } else {
                $items = $models;
            }

            foreach ($items as $item) {
                $data['rows'][] = $this->module->row($meta)->execute($request->withAttribute('model', $item));
            }
        }

        return $data;
    }

}
