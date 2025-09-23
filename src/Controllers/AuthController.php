<?php

namespace App\Controllers;

class AuthController {
    public function registerForm() {
        session_start();
        dump($_SESSION);
    }

    public function register() {
        dump($_POST);
        $user = User::where('email', $_POST['email']);
        if(isset($user[0]) || !isset($_POST["email"]) || $_POST['password'] !== $_POST['password_confirm']) {
            return header('Location: /register');
        }
        $user = new User();
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        $user->save();
        header('Location: /login');
    }

    public function loginForm() {

    }

    public function login() {

    }

    public function logout() {

    }
}