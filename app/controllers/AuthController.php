<?php

require_once __DIR__ . '/../models/User.php';

class AuthController
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $this->user->create($email, $password);

            header('Location: index.php?page=login');
            exit;
        }

        require __DIR__ . '/../views/auth/register.php';
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->user->findByEmail($email);

            if ($user && password_verify($password, $user['password'])) {

                $_SESSION['user'] = $user;

                header('Location: index.php');
                exit;
            }
        }

        require __DIR__ . '/../views/auth/login.php';
    }

    public function logout()
    {
        session_destroy();

        header('Location: index.php');
        exit;
    }
}