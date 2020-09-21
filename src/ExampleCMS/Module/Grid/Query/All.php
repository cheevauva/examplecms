<?php

namespace ExampleCMS\Module\Grid\Query;

class All extends \ExampleCMS\Query\Query
{

    public function fetchManyRaw()
    {
        $grids = array();

        $responder = $this->metadata->get(array(
            'responder',
            'default',
        ));

        $responder += $this->metadata->get(array(
            'responder',
            $this->module,
        ));


        foreach ($responder as $alias => $metadata) {
            if (strpos($alias, 'grids.') !== 0) {
                continue;
            }
            $metadata['id'] = $alias;
            $grids[$alias] = $metadata;
        }

        return $grids;
    }

}
