<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    public $errors = [];
    function validate($email, $password)
    {
        $validator = new Validator();
        if (!$validator::email($email)) {
           $this ->errors['email'] = 'Please provide a valid email address.';
        }

        if (!$validator->string($password, 7, 255)) {
            $this->errors['password'] = 'Please provide a valid password .';
        }
        return empty($this->errors);
    }
}