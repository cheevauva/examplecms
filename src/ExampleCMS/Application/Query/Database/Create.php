<?php

namespace ExampleCMS\Query\Database;

use \ExampleCMS\DTO\Query\ResultSetEntity;

class Create extends \ExampleCMS\Query\Database\Query
{

    /**
     * @var array
     */
    protected $fields = [];

    protected function getReplaceData()
    {
        $replaceData = parent::getReplaceData();

        $this->parameters = [];

        $columns = [];
        $values = [];

        foreach ($this->fields as $field => $value) {
            $this->parameters[':' . $field] = $value;

            $values[] = ':' . $field;
            $columns[] = $field;
        }

        $replaceData['values'] = implode(', ', $values);
        $replaceData['columns'] = implode(', ', $columns);

        return $replaceData;
    }

    public function execute($params)
    {
        $this->fields = $this->getDatabaseFields($params['model']);
        
        parent::execute();

        return new ResultSetEntity([
            [
                'id' => $this->connection->lastInsertId(),
            ]
        ]);
    }

    protected function getPlainSql()
    {
        return "INSERT INTO <table> (<columns>) VALUES (<values>)";
    }

    protected function getDatabaseFields(IModel $model)
    {
        $fields = $this->getTable()->get('fields');

        $result = array();

        foreach ($fields as $field) {
            $result[$field['name']] = $model->get($field['name']);
        }

        return $result;
    }

}
