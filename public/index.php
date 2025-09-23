<?php

if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js)$/', $_SERVER["REQUEST_URI"])) {
    return false;    // serve the requested resource as-is.
}

require __DIR__ . '/../helpers.php';

spl_autoload_register(function ($class) {
    $class = substr($class, 4);
    require_once __DIR__ . "/../src/$class.php";
});

require __DIR__ . '/../routes.php';


$router = new App\Router($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
$match = $router->match();
if($match) {
    if(is_callable($match['action'])){
        call_user_func($match['action']);
    } else if(is_array($match['action'])){
        $className = $match['action'][0];
        $controller = new $className();
        $method = $match['action'][1];
        $controller->$method();
    }
    
} else {
    echo '404 page not found';
}
