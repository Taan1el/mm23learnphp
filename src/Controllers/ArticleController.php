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
