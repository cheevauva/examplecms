<?php

namespace ExampleCMS\Query\Database;

class Query extends \ExampleCMS\Query\Query
{

    public $logger;

    /**
     * @var array
     */
    protected $parameters = array();
    public $tableFactory;

    protected function getConnection()
    {
        return $this->getTable()->getConnection();
    }

    protected function getTable()
    {
        return $this->tableFactory->get($this->bundle->getModule()->get('table'));
    }

    protected function getReplaceData()
    {
        return array(
            'table' => $this->getTable()->get('name'),
        );
    }

    protected function getPlainSql()
    {
        return '';
    }

    public function execute($params = null)
    {
        $sql = $this->__toString();

        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute($this->parameters);

        try {
            return $this->prepareResultSet($this->execute()->fetchAll(\PDO::FETCH_ASSOC));
        } catch (\PDOException $e) {
            $this->logger->critical($e->getMessage());
            return $this->prepareResultSet();
        }
    }

    protected function prepareResultSet(array $rows = array())
    {
        return new \ExampleCMS\DTO\Query\ResultSetEntity($rows);
    }

    protected function __toString()
    {
        $replaceData = $this->getReplaceData();
        $replace = array();

        foreach ($replaceData as $key => $value) {
            $replace['<' . $key . '>'] = $value;
        }

        return strtr($this->getPlainSql(), $replace);
    }

}
