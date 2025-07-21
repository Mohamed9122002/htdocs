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
$router->get('/notes', 'Controllers/notes/index.php')->only('authenticated');
$router->get('/note', 'Controllers/notes/show.php');
$router->delete('/note', 'Controllers/notes/destroy.php');
$router->get('/notes/create', 'controllers/notes/create.php');
$router->post('/notes/create', 'controllers/notes/store.php');
$router->get('/note/edit', 'controllers/notes/edit.php');
$router->patch('/note', 'controllers/notes/update.php');
$router->get('/register', 'controllers/registration/create.php')->only('guest');
$router->post('/register', 'controllers/registration/store.php');
// dd($router->routes);