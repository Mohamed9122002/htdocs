<?php
$config = require('config.php');
$db = new Database($config);

$heading = "Create Note";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db->query("INSERT INTO notes (body,userId) VALUES (:body,:userId)",[
        "body"=> $_POST["body"],
        "userId"=> 1,
    ]);
}
require "Views/create.view.php";