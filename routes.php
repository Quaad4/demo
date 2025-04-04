<?php

$router->get('/', '/index.php');
$router->get('/about', '/about.php');
$router->get('/contact', '/contact.php');

$router->get('/notes', '/notes/index.php')->only('auth');
$router->get('/note', '/notes/show.php');
$router->get('/notes/edit', '/notes/edit.php');
$router->patch('/notes', '/notes/update.php');
$router->post('/notes', '/notes/store.php');
$router->delete('/notes', '/notes/destroy.php');
$router->get('/notes/create', '/notes/create.php');

$router->get('/register', '/registration/create.php')->only('guest');
$router->post('/register', '/registration/store.php');

$router->get('/sessions/create', '/sessions/create.php')->only('guest');
$router->post('/sessions', '/sessions/store.php')->only('guest');
$router->delete('/sessions', '/sessions/destroy.php')->only('auth');