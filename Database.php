<?php

class Database
{
    public $connection;

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
        $statement = $this->connection->prepare($query);
        $statement->execute($params); //ح هنا
        return $statement;
    }
    
}
// Hello 