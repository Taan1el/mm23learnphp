<?php

function dump(...$args) {
    echo '<pre>';
    var_dump(...$args);
    echo '</pre>';
}

function dd(...$args) {
    dump(...$args);
    die;
}

function view($viewName, $variables=[]) {
    extract($variables);
    include __DIR__ . "/views/$viewName.php";
}