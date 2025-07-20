<?php
use Core\Database;
use Core\App;
// require "Database.php";
// $config = require base_path("config.php");
// $db = new Database($config);
$db = App::getContainer()->resolve('Core\Database');
 // Assuming you want to display the database name
//  $heading  = "Notes";
 $notes = $db->query("SELECT * FROM notes" , [])->fetchAll();
//   require base_path('Views/notes/index.view.php');

  view('notes/index.view.php',[
    'heading'=> 'Notes',
    'notes'=> $notes
  ]);

