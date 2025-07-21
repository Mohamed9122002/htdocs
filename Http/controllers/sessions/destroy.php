<?php
// logout the user out 
use Core\App;
use Core\Authenticator;
$auth = new Authenticator();
$auth->logout();
header('location: /');
exit();