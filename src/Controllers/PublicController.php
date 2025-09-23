<?php

namespace App\Controllers;


class PublicController
{
    public function index() {
        $title = 'World news';
        $posts = [
            ['title' => 'World news 1', 'author' => 'Pets', 'published' => '12.09.2025', 'body' => 'Some world news 1 body'],
            ['title' => 'World news 2', 'author' => 'Maali', 'published' => '11.09.2025', 'body' => 'Some world news 2 body'],
            ['title' => 'World news 3', 'author' => 'Annika', 'published' => '10.09.2025', 'body' => 'Some world news 3 body'],
            ['title' => 'World news 4', 'author' => 'Mats', 'published' => '09.09.2025', 'body' => 'Some world news 4 body'],
        ];
        view('index', compact('title', 'posts'));
    }

    public function us() {
        $title = 'U.S news';
        $posts = [
            ['title' => 'U.S news 1', 'author' => 'Pets', 'published' => '12.09.2025', 'body' => 'Some U.S news 1 body'],
            ['title' => 'U.S news 2', 'author' => 'Maali', 'published' => '11.09.2025', 'body' => 'Some U.S news 2 body'],
            ['title' => 'U.S news 3', 'author' => 'Annika', 'published' => '10.09.2025', 'body' => 'Some U.S news 3 body'],
            ['title' => 'U.S news 4', 'author' => 'Mats', 'published' => '09.09.2025', 'body' => 'Some U.S news 4 body'],
        ];
        view('us', compact('title', 'posts'));
    }

    public function form(){
        view('form');
    }

    public function answer(){
        dump($_SERVER);
        dump($_GET);
        dump($_POST);
    }
}
