<?php

class Database
{
    public $connection;
    public function __construct($config,$userName = 'root', $password = 'database@.@912')
    {
 
        // You can initialize your database connection here if needed
        // $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";
        $dsn = 'mysql:'.http_build_query($config, '', ';');
        $this->connection = new PDO($dsn, $userName, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }
    // query method to execute SQL queries injections 
    public function query($query,$params =[])
    {

        $statment = $this->connection->prepare($query);
        $statment->execute(params: $params);
        return $statment;
    }
    
}
// Hello 