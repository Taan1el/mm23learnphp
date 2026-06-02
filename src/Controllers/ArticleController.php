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
        $this->storeImage($_FILES['image'] ?? null);

        $article = new Article();
        $article->title = trim($_POST['title'] ?? '');
        $article->body = trim($_POST['body'] ?? '');
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

    private function storeImage($image)
    {
        if (!$image || ($image['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) {
            return null;
        }

        if (($image['error'] ?? UPLOAD_ERR_OK) !== UPLOAD_ERR_OK || !is_uploaded_file($image['tmp_name'])) {
            header('Location: /articles/create');
            exit;
        }

        $extension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
        if (!in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'], true)) {
            header('Location: /articles/create');
            exit;
        }

        $uploadDir = __DIR__ . '/../../public/uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        do {
            $name = bin2hex(random_bytes(16)) . '.' . $extension;
            $filename = $uploadDir . $name;
        } while (file_exists($filename));

        move_uploaded_file($image['tmp_name'], $filename);
        return $name;
    }
}
