<?php
const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . 'Core/Functions.php';
/// connect to our mysql database
// require base_path('Database.php');
// require base_path( 'Response.php');
spl_autoload_register(function ($class){
    require base_path("Core/{$class}.php");
} );
require base_path('route.php');