<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
    public function index()
    {
        $title = 'Users';
        $users = User::all();
        view('users/index', compact('title', 'users'));
    }

    public function create()
    {
        $title = 'Create user';
        $errors = [];
        view('users/create', compact('title', 'errors'));
    }

    public function store()
    {
        $email = trim($_POST['email'] ?? '');
        $password = (string)($_POST['password'] ?? '');
        $passwordConfirm = (string)($_POST['password_confirm'] ?? '');

        $errors = [];
        if (!$email) {
            $errors['email'] = 'Email is required';
        }
        if (!$password) {
            $errors['password'] = 'Password is required';
        }
        if ($password !== $passwordConfirm) {
            $errors['password_confirm'] = 'Passwords do not match';
        }
        if ($email && isset(User::where('email', $email)[0])) {
            $errors['email'] = 'Email already exists';
        }

        if ($errors) {
            $title = 'Create user';
            view('users/create', compact('title', 'errors', 'email'));
            return;
        }

        $user = new User();
        $user->email = $email;
        $user->password = password_hash($password, PASSWORD_BCRYPT);
        $user->save();

        header('Location: /users');
        exit;
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        $user = $id ? User::find((int)$id) : null;
        if (!$user) {
            header('Location: /users');
            exit;
        }

        $title = 'Edit user';
        $errors = [];
        view('users/edit', compact('title', 'errors', 'user'));
    }

    public function update()
    {
        $id = (int)($_POST['id'] ?? 0);
        $user = $id ? User::find($id) : null;
        if (!$user) {
            header('Location: /users');
            exit;
        }

        $email = trim($_POST['email'] ?? '');
        $password = (string)($_POST['password'] ?? '');
        $passwordConfirm = (string)($_POST['password_confirm'] ?? '');

        $errors = [];
        if (!$email) {
            $errors['email'] = 'Email is required';
        }
        $existing = $email ? (User::where('email', $email)[0] ?? null) : null;
        if ($existing && (int)$existing->id !== (int)$user->id) {
            $errors['email'] = 'Email already exists';
        }

        if ($password || $passwordConfirm) {
            if (!$password) {
                $errors['password'] = 'Password is required';
            }
            if ($password !== $passwordConfirm) {
                $errors['password_confirm'] = 'Passwords do not match';
            }
        }

        if ($errors) {
            $title = 'Edit user';
            $user->email = $email;
            view('users/edit', compact('title', 'errors', 'user'));
            return;
        }

        $user->email = $email;
        if ($password) {
            $user->password = password_hash($password, PASSWORD_BCRYPT);
        }
        $user->save();

        header('Location: /users');
        exit;
    }

    public function destroy()
    {
        $id = $_GET['id'] ?? null;
        $user = $id ? User::find((int)$id) : null;
        if ($user) {
            $user->delete();
        }

        header('Location: /users');
        exit;
    }
}

