<?php
require "Database.php";
$config = require "config.php";
$db = new Database($config);
 // Assuming you want to display the database name
 $heading  = "Note";
 $id = $_GET['id'] ?? null;
 echo $id;
 $note = $db->query("SELECT * FROM notes where id = :id" , ['id' =>$id])->fetch(PDO::FETCH_ASSOC);
 require "Views/note.view.php";