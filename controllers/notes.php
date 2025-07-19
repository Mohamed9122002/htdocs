<?php
// require "Database.php";
$config = require "config.php";
$db = new Database($config);
 // Assuming you want to display the database name
 $heading  = "Notes";
 $notes = $db->query("SELECT * FROM notes" , [])->fetchAll(PDO::FETCH_ASSOC);
 require "Views/notes.view.php";
