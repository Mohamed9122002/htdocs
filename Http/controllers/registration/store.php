<?php
use Core\App;
use Core\Authenticator;
use Http\Forms\LoginForm;
// require "Database.php";
// $config = require base_path("config.php");
// $db = new Database($config);
$db = App::getContainer()->resolve('Core\Database');

$email = $_POST['email'];
$password = $_POST['password'];
$form = new LoginForm();
if (!$form->validate($email, $password)) {
    return view('sessions/create.view.php', [
        'errors' => $form->errors
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
