<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password)
    {
        $db = App::getContainer()->resolve('Core\Database');
        $user = $db->query("SELECT * FROM userRegister WHERE email = :email", [
            'email' => $email
        ])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login([
                    'email' => $email
                ]);
                return true;
            }
        }
        return false;

    }
    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email'],
        ];

    }
    public function logout()
    {
        $_SESSION = [];
        session_destroy();
        $params = session_get_cookie_params();

        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }

}