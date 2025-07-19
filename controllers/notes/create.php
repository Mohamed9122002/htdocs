<?php
$config = require('config.php');
$db = new Database($config);

$heading = "Create Note";
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if(strlen(($_POST['body']) == 0)) {
        $errors['body'] = "Body is required";
        
    }
        if(strlen(($_POST['body']) > 1000)) {
        $errors['body'] = "the body more than 1000 characters";
        
    }
    if(empty($errors)) {
       $db->query("INSERT INTO notes (body,userId) VALUES (:body,:userId)",[
        'body'=> $_POST['body'],
        "userId"=> 1,
    ]);  
    }
}
require "Views/create.view.php";