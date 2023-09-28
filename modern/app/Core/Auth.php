<?php

namespace App\Core;

class Auth
{
    public function __construct()
    {
        session_start();
    }

    public function user()
    {
        return $_SESSION['user'] ?? null;
    }

    public function required()
    {
        if (!$this->user()) {
            http_response_code(403);
            die();
        }
    }

    public function logIn($user)
    {
        $_SESSION['user'] = $user;
        session_regenerate_id(true);
    }
    public function logOut()
    {
        session_unset();
        session_destroy();
    }
}
