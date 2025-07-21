<?php
use Core\Database;
use Core\Validator;
use Core\App;
require base_path("Core/Validator.php");
// require "Database.php";
// $config = require base_path("config.php");
// $db = new Database($config);
$db = App::getContainer()->resolve('Core\Database');
$errors = [];

$validator = new Validator();

if (!$validator->string($_POST['body'], 1, 1000)) {
    $errors['body'] = "A Body of on more than 1,000 characters is required.";

}
if (!empty($errors)) {
 return   view('notes/create.view.php', [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}
if (empty($errors)) {
    $db->query("INSERT INTO notes (body,userId) VALUES (:body,:userId)", [
        'body' => $_POST['body'],
        "userId" => 1,
    ]);
    header('Location: /notes');
    die();
}
