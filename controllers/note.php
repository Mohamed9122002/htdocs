<?php
// require "Database.php";
$config = require "config.php";
$db = new Database($config);
// Assuming you want to display the database name
$heading = "Note";
$CurrentUserId = 1; // Assuming the current user ID is 1 for this example
$id = $_GET['id'] ?? null;
//  echo $id;
$note = $db->query("SELECT * FROM notes where  id = :id", ['id' => $id])->findOrFail();
authorize($note['userId'] == $CurrentUserId);
require "Views/note.view.php";
//  print_r($note);
// var_dump($note);