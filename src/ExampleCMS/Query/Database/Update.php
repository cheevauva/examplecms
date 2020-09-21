<?php

namespace ExampleCMS\Query\Database;

class Update extends Create
{

    protected function getReplaceData()
    {
        $replaceData = parent::getReplaceData();
        $columnsValues = array();

        foreach ($this->fields as $field => $value) {
            $this->parameters[':' . $field] = $value;

            $columnsValues[] = $field . ' = :' . $field;
        }

        if (empty($columnsValues)) {
            throw $this->exceptionFactory->get('nothing_update');
        }

        $replaceData['columnsValues'] = implode(', ', $columnsValues);

        return $replaceData;
    }

    public function fetch()
    {
        $this->execute();

        return $this->fields;
    }

    protected function getPlainSql()
    {
        return "UPDATE <table> SET <columnsValues> WHERE id = :id";
    }
}
