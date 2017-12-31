<?php

namespace Driver;


class PDODatabaseStatement implements DatabaseStatementInterface
{
    private $statement;

    public function __construct(\PDOStatement $statement)
    {
        $this->statement = $statement;
    }

    public function execute(array $params = [])
    {
        $this->statement->execute($params);
    }

    public function rowCount()
    {
        return $this->statement->rowCount();
    }

    public function fetch()
    {
        return $this->statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function fetchAll()
    {
        return $this->statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function fetchObject($className)
    {
        return $this->statement->fetchObject($className);
    }
}