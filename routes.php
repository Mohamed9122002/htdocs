<?php
// return [
//     '/' => 'controllers/index.php',
//     '/about' => 'controllers/about.php',
//     '/notes' => 'controllers/notes/index.php',
//     '/note' => 'controllers/notes/show.php',
//     '/notes/create'=> 'controllers/notes/create.php',
//     '/contact' => 'controllers/contact.php',
// ];
// $router-> get('/' ,'controllers/index.php');
$router->get('/', 'Controllers/index.php');
$router->get('/about', 'Controllers/about.php');
$router->get('/contact', 'Controllers/contact.php');
$router->get('/notes', 'Controllers/notes/index.php');
$router->get('/note', 'Controllers/notes/show.php');
$router->get('/notes/create', 'Controllers/notes/create.php');
$router->delete('/note','Controllers/notes/destory.php');
// dd($router->routes);