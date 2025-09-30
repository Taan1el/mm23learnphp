<?php

namespace App\Controllers;


use App\Models\Article;
use App\Models\User;

class ArticleController
{
    public function index()
    {
        
        $articles = Article::all();
        view('articles/index', compact('articles'));
    }

    public function create() {
        view('articles/create');
    }
    
    public function store() {
        do {
            $name = md5($_FILES['image']['name']. microtime() . rand(PHP_INT_MIN, PHP_INT_MAX));
            $name .= '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $filename = __DIR__ . '/../../public/uploads/' . $name;
        } while (file_exists($filename));
        
        move_uploaded_file($_FILES['image']['tmp_name'], $filename);
        $article = new Article();
        $article->title = $_POST['title'];
        $article->body = $_POST['body'];
        $article->save();
        header('Location: /articles');
    }

    public function view() {
        $article = Article::find($_GET['id']);
        view('articles/view', compact('article'));
    }

    public function edit() {
        $article = Article::find($_GET['id']);
        view('articles/edit', compact('article'));
    }

    public function update() {
        $article = Article::find($_GET['id']);
        $article->title = $_POST['title'];
        $article->body = $_POST['body'];
        $article->save();
        header('Location: /articles');
    }

    public function destroy() {
        $article = Article::find($_GET['id']);
        $article->delete();
        header('Location: /articles');
    }
}
