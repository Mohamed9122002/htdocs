<?php
use Core\Database;
// require "Database.php";
$config = require base_path("config.php");
$db = new Database($config);
// Assuming you want to display the database name
$CurrentUserId = 1;
    $note = $db->query("SELECT * FROM notes where  id = :id", ['id' => $_POST['id']])->findOrFail();
    authorize($note['userId'] == $CurrentUserId);
//  echo $id;
    $db->query("DELETE FROM notes WHERE id = :id", ['id' => $_POST['id']]);
    header('Location: /notes');
    exit;
