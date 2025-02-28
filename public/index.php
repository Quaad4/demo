<?php 

use core\Router;

const BASE_PATH = __DIR__ . '/../';

require(BASE_PATH . 'core/functions.php');

spl_autoload_register(function ($class) {

    $class = str_replace('\\', '/', $class);

    require base_path("{$class}.php");
});

$router = new Router();

require(base_path('routes.php'));

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = isset($_POST['_method']) ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, 'GET');