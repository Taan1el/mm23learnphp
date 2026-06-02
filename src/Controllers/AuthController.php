<?php

namespace App\Controllers;

use App\Models\User;

class AuthController {
    public function registerForm() {
        view('auth/register');
    }

    public function register() {
        $email = trim($_POST['email'] ?? '');
        $password = (string)($_POST['password'] ?? '');
        $passwordConfirm = (string)($_POST['password_confirm'] ?? '');
        $user = $email ? User::where('email', $email) : [];
        if(isset($user[0]) || !$email || !$password || $password !== $passwordConfirm) {
            return header('Location: /register');
        }
        $user = new User();
        $user->email = $email;
        $user->password = password_hash($password, PASSWORD_BCRYPT);
        $user->save();
        header('Location: /login');
    }

    public function loginForm() {
        view('auth/login');
    }

    public function login() {
        $email = trim($_POST['email'] ?? '');
        $password = (string)($_POST['password'] ?? '');
        $user = $email ? User::where('email', $email) : [];
        // if(isset($user[0])) {
        //     $user = $user[0];
        // } else {
        //     $user = null;
        // }
        $user = $user[0] ?? null;
        if(!$user || !password_verify($password, $user->password)) {
           return header('Location: /login');
        }
        $_SESSION['userID'] = $user->id;
        header('Location: /');
    }

    public function logout() {
        unset($_SESSION['userID']);
        header('Location: /');
    }
}
