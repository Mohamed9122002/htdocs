<?php
use Core\App;
use Core\Validator;
$db = App::getContainer()->resolve('Core\Database');
$email = $_POST['email'];
$password = $_POST['password'];
$validator = new Validator();
$errors = [];
if (!$validator->email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (!$validator->string($password, 7, 255)) {
    $errors['password'] = 'Please provide a valid password .';
}
if (!empty($errors)) {
    return view('sessions/create.view.php', [
        'errors' => $errors
    ]);
}
// Check if user exists 
$user = $db->query("SELECT * FROM userRegister WHERE email = :email", [
    'email' => $email
])->find();
if ($user) {

    if (password_verify($password, $user['password'])) {
        login(['email' => $email]);
        header('location:/');
        exit;
    }
}
return view('sessions/create.view.php', [
    'errors' => [
        'email' => 'No matching account for that email address or password .'
    ]
]);