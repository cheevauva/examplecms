<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Application\Grid;

class Json extends Basic
{

    protected function getData()
    {

        $metadata = array();
        $metadata['rows'] = array();

        foreach ($this->metadata['rows'] as $row) {
            if (empty($row['type'])) {
                $this->exceptionFactory->throw('type_is_not_define');
            }
            if (empty($row['iterate'])) {
                $metadata['rows'][] = $this->prepareRow($row, $this->models);
                continue;
            }

            foreach ($this->models as $model) {
                $metadata['rows'][] = $this->prepareRow($row, $model);
            }
        }

        return $metadata;
    }

}
