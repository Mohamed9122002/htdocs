<?php
  use Core\App;
  $db = App::getContainer()->resolve('Core\Database');
  // Assuming you want to display the database name
  $CurrentUserId = 1;
  $id = $_GET['id'] ?? null;
  //  echo $id;
  $note = $db->query("SELECT * FROM notes where  id = :id", ['id' => $id])->findOrFail();
  authorize($note['userId'] == $CurrentUserId);
  view('notes/edit.view.php',[
    'heading'=> 'Edit Note',
       'errors'=> [],
       'note'=> $note
  ]);