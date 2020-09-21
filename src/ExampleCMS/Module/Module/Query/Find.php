<?php

namespace ExampleCMS\Module\Module\Query;

class Find extends \ExampleCMS\Query\Query
{

    public function fetchManyRaw()
    {
        $rows = array();
        $row = $this->fetchOneRaw();

        if (!empty($row)) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function fetchOneRaw()
    {
        $modules = $this->metadata->get(array(
            'modules'
        ));

        if (empty($modules[$this->params['id']])) {
            return array();
        } else {
            $row = $modules[$this->params['id']];
        }

        $row['id'] = $this->params['id'];

        return $row;
    }

}
