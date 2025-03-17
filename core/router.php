<?php

namespace core;

use core\middleware\Auth;
use core\middleware\Guest;
use core\middleware\Middleware;

class Router {
    protected $routes = [];

    public function add($uri, $controller, $method) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];
        return $this;
    }

    public function get($uri, $controller) {
        return $this->add($uri, $controller, 'GET');
    }

    public function post($uri, $controller) {
        return $this->add($uri, $controller, 'POST');
    }

    public function delete($uri, $controller) {
        return $this->add($uri, $controller, 'DELETE');
    }

    public function put($uri, $controller) {
        return $this->add($uri, $controller, 'PUT');
    }

    public function patch($uri, $controller) {
        return $this->add($uri, $controller, 'PATCH');
    }

    public function only($key) {
        $this->routes[count($this->routes) - 1]['middleware'] = $key;
        return $this;
    }

    public function route($uri, $method) {
        foreach($this->routes as $route) {
            if($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

                Middleware::resolve($route['middleware']);

                return require base_path($route['controller']);
            }
        }

        abort();
    }
}