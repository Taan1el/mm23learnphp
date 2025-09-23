<?php

namespace App\Models;

class Article extends Model {
    public static $table = 'articles';

    public $id;
    public $title;
    public $body;
}