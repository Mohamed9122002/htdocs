<?php
use Core\App;
use Core\Validator;
use Core\Authenticator;
use Http\Forms\LoginForm;
// require "Database.php";
// $config = require base_path("config.php");
// $db = new Database($config);
$db = App::getContainer()->resolve('Core\Database');
$validator = new Validator();
$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];
if (!$validator->email($email)) {
   $errors['email'] = 'Please provide a valid email address.';
}

if (!$validator->string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least seven characters.';
}

if (! empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}
$user = $db->query("SELECT * FROM userRegister WHERE email = :email", [
    'email' => $email
])->find();
if ($user) {
    header('location:/');
    exit;
} else {
    $user = $db->query("INSERT INTO userRegister (email,password) VALUES (:email,:password)", [
        "email" => $email,
        "password" => password_hash($password, PASSWORD_BCRYPT)
    ]);
    /// Mak that user has logged in
    $_SESSION['user'] = [
        'email' => $email,
    ];
    header('location:/');
    exit;
}
