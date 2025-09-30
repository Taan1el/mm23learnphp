<?php

namespace App\Controllers;

use App\Models\User;

class AuthController {
    public function registerForm() {
        view('auth/register');
    }

    public function register() {
        $user = User::where('email', $_POST['email']);
        if(isset($user[0]) || !isset($_POST['email']) || $_POST['password'] !== $_POST['password_confirm']) {
            return header('Location: /register');
        }
        $user = new User();
        $user->email = $_POST['email'];
        $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $user->save();
        header('Location: /login');
    }

    public function loginForm() {
        view('auth/login');
    }

    public function login() {
        dump($_POST);
        $user = User::where('email', $_POST['email']);
        // if(isset($user[0])) {
        //     $user = $user[0];
        // } else {
        //     $user = null;
        // }
        $user = $user[0] ?? null;
        if(!$user || !password_verify($_POST['password'], $user->password)) {
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