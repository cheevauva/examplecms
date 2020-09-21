<?php

namespace ExampleCMS\Module\Grid\Query;

class Find extends \ExampleCMS\Query\Query
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
            $metadata['id'] = $alias;
            $responder[$alias] = $metadata;
        }
        
        return $responder;
    }
}
