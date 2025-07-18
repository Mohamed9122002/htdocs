<?php
require "Core/Functions.php";
// require "route.php";
/// connect to our mysql database
require "Database.php";
$config = require "config.php";
$db = new Database($config);
$id = $_GET["id"];
// echo $id;
$query = "SELECT * FROM posts WHERE idPosts = ?";
// echo $query;
$posts = $db->query($query,params: [$id])->fetch();

echo $posts['title'];