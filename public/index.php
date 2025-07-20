<?php
use Core\Router;
const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . 'Core/Functions.php';
/// connect to our mysql database
// require base_path('Database.php');
// require base_path( 'Core/Response.php');
spl_autoload_register(function ($class){
    $result = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path("{$result}.php");
});
require base_path('bootstrap.php');
$router = new Router();

$routes  = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$router->route($uri,$method);
