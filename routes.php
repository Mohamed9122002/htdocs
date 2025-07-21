<?php
// return [
//     '/' => 'index.php',
//     '/about' => 'about.php',
//     '/notes' => 'notes/index.php',
//     '/note' => 'notes/show.php',
//     '/notes/create'=> 'notes/create.php',
//     '/contact' => 'contact.php',
// ];
// $router-> get('/' ,'index.php');
$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');
$router->get('/notes', 'notes/index.php')->only('authenticated');
$router->get('/note', 'notes/show.php');
$router->delete('/note', 'notes/destroy.php');
$router->get('/notes/create', 'notes/create.php');
$router->post('/notes/create', 'notes/store.php');
$router->get('/note/edit', 'notes/edit.php');
$router->patch('/note', 'notes/update.php');
$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php');
$router->get('/login', 'sessions/create.php')->only('guest');
$router->post('/login', 'sessions/store.php')->only('guest');
$router->delete('/session', 'sessions/destroy.php')->only('authenticated');
// dd($router->routes);