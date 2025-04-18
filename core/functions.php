<?php

use core\Response;

function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function UrlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = Response::NOT_FOUND) {
    http_response_code($code);

    require(base_path("views/{$code}.php"));

    die();
}

function authorize($condition, $status = Response::FORBIDDEN) {
    if(!$condition) {
        return abort($status);
    }
}

function base_path($path) {
    return BASE_PATH . $path;
}

function view($path, $attributes = []) {
    extract($attributes);
    
    require base_path('views/' . $path);
}

function login($user) {
    $_SESSION['user'] = [
        'email' => $user['email']
    ];

    session_regenerate_id(true);
}

function logout() {
    //logging the user out 
    // deleting all info in the sessions
    $_SESSION = [];
    session_destroy();

    // destroying the cookie
    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}