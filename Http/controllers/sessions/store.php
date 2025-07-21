<?php
use Core\App;
use Core\Authenticator;
use Core\Validator;
use Http\Forms\LoginForm;
$db = App::getContainer()->resolve('Core\Database');
$email = $_POST['email'];
$password = $_POST['password'];

$validator = new Validator();
$form = new LoginForm();
if ($form->validate($email, $password)) {
    $auth = new Authenticator();
    // $auth->attempt($email, $password);
    if ($auth->attempt($email, $password)) {
        redirect('/');
    }

        $form->error('email', 'No matching account for that email address or password.');
    
}
return view('sessions/create.view.php', [
    'errors' => $form->errors()
]);

// Check if user exists 
// $user = $db->query("SELECT * FROM userRegister WHERE email = :email", [
//     'email' => $email
// ])->find();
// if ($user) {

//     if (password_verify($password, $user['password'])) {
//         login(['email' => $email]);
//         header('location:/');
//         exit;
//     }
// }
// return view('sessions/create.view.php', [
//     'errors' => [
//         'email' => 'No matching account for that email address or password .'
//     ]
// ]);