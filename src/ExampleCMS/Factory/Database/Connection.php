<?php

namespace ExampleCMS\Factory\Database;

class Connection
{

    /**
     * @var array
     */
    protected $connections = array();

    /**
     * @var \ExampleCMS\Config
     */
    public $config;

    public function getConnection()
    {
        $type = empty($this->metadata['type']) ? 'mysql' : $this->metadata['type'];

        switch ($type) {
            case 'mysql':
                $dsn = "mysql:host={$row['host']};";
                $dsn .= "dbname={$row['database']};";
                $dsn .= "charset={$row['charset']};";

                $connection = new \ExampleCMS\Database\Connection($dsn, $row['username'], $row['password']);
                break;
            case 'sqlite':
                $dsn = "sqlite:" . $this->filesystem->getBasePath() . "{$row['path']}";
                $connection = new \ExampleCMS\Database\Connection($dsn);
                break;
        }

        $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $connection;
    }

    /**
     * @param string $module
     * @return \ExampleCMS\Database\Connection
     */
    public function get($connectionName)
    {
        if (isset($this->connections[$connectionName])) {
            return $this->connections[$connectionName];
        }

        $db = $this->config->get(array(
            'connections',
            $connectionName,
        ));

        $type = empty($db['type']) ? 'mysql' : $db['type'];

        switch ($type) {
            case 'mysql':
                $dsn = "mysql:host={$db['host']};";
                $dsn .= "dbname={$db['database']};";
                $dsn .= "charset={$db['charset']};";

                $connection = new \ExampleCMS\Database\Connection($dsn, $db['username'], $db['password']);
                break;
            case 'sqlite':
                $dsn = "sqlite:" . $this->filesystem->getBasePath() . "{$db['path']}";
                $connection = new \ExampleCMS\Database\Connection($dsn);
                break;
        }

        $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        $this->connections[$connectionName] = $connection;

        return $connection;
    }
}
