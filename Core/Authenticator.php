<?php

namespace Core;

use Core\App;
use Core\Database;
use Core\Session;

class Authenticator
{
    public   function login($user)
    {
        $_SESSION['user'] = [
            'id' => isset($user['id']) ? $user['id'] : null,
            'email' => isset($user['email']) ? $user['email'] : null,
        ];

        session_regenerate_id(true);
    }



    public static  function logout()
    {
        Session::destroy();
    }


    public function attempt($email, $password)
    {
        $statment = App::container()->resolve(Database::class);

        $statment->query("SELECT * FROM users WHERE email = :email", [
            'email' => $email
        ]);
        $user = $statment->find();

        if ($user && password_verify($password, $user['password'])) {
            $this->login([
                'id' => $user['id'],
                'email' => $user['email']
            ]);

            return true;
        }

        return false;
    }
}
