<?php

namespace App\Controllers;

class AuthController {
    public function registerForm() {
        session_start();
        dump($_SESSION);
    }

    public function register() {

    }

    public function loginForm() {

    }

    public function login() {

    }

    public function logout() {
        unset($_SESSION['userID']);
        header('Location: /');
    }
}