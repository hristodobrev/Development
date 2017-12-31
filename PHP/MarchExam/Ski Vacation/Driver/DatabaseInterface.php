<?php

namespace Driver;

interface DatabaseInterface
{
    public function prepare($query) : DatabaseStatementInterface;

    public function errorInfo();

    public function lastId();
}