<?php
use Core\Response;
// use Core\Response;
const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . 'Core/Functions.php';
/// connect to our mysql database
// require base_path('Database.php');
// require base_path( 'Core/Response.php');
spl_autoload_register(function ($class){
    $result = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path("{$result}.php"); // 
});
require base_path('Core/route.php');