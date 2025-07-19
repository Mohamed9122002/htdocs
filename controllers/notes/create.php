<?php
use Core\Database;
use Core\Validator;
require base_path( "Core/Validator.php");
$config = require base_path ('config.php');
$db = new Database($config);
$errors = [];
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $validator = new Validator();

    if(!$validator->string($_POST['body'], 1, 1000)) {
        $errors['body'] = "A Body of on more than 1,000 characters is required.";
        
    }

    if(empty($errors)) {
       $db->query("INSERT INTO notes (body,userId) VALUES (:body,:userId)",[
        'body'=> $_POST['body'],
        "userId"=> 1,
    ]);  
    }
}
// require "Views/notes/create.view.php";
  view('notes/create.view.php',[
    'heading'=> 'Create Note',
       'errors'=> $errors
  ]);
