<?php

class Database
{
    public $connection;
    public $statement;
    public function __construct($config, $userName = 'root', $password = 'database@.@912')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');
        $this->connection = new PDO($dsn, $userName, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    // query method to execute SQL queries
    public function query($query, $params = [])
    {
        $this ->statement = $this->connection->prepare($query);
        $this->statement->execute($params); 
        return $this;
    }
    public function find() {
        return $this->statement->fetch();
    }
    public function findOrFail() {
        $result = $this->find();
        if (!$result) {
            abort();
        }
        return $result;
    }
    public function fetchAll() {
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }

}