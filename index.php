<?php
require "Core/Functions.php";
require "route.php";
/// connect to our mysql database
require "Database.php";
$config = require "config.php";
$db = new Database($config);
$id = $_GET["id?"] ?? null;
// echo $id;
$query = "SELECT * FROM notes WHERE userId = ?";
// echo $query;
$result = $db->query($query, [1])->fetchAll(PDO::FETCH_ASSOC);
