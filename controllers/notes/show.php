<?php
use Core\Database;
// require "Database.php";
$config = require base_path("config.php");
$db = new Database($config);
// Assuming you want to display the database name

$CurrentUserId = 1; // Assuming the current user ID is 1 for this example
$id = $_GET['id'] ?? null;
//  echo $id;
$note = $db->query("SELECT * FROM notes where  id = :id", ['id' => $id])->findOrFail();
authorize($note['userId'] == $CurrentUserId);
//  require base_path('Views/notes/show.view.php');
  view('notes/show.view.php',[
    'heading'=> 'Note',
    'note' => $note
  ]);

//  print_r($note);
// var_dump($note);