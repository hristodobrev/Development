<?php
namespace Driver;

interface DatabaseStatementInterface
{
    public function execute(array $params = []);

    public function rowCount();

    public function fetch();

    public function fetchAll();

    public function fetchObject($className);
}