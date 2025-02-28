<?php

use core\Database;
use core\Validator;

$config = require(base_path('config.php'));
$db = new Database($config['database']);

$errors = [];

$body = $_POST['body'];

if(!Validator::string($body, 1, 1000)) {
    $errors['body'] = 'The note description is required and must be no more than 1000 characters.';
}

if(!empty($errors)) {
    return view('notes/create.view.php', [
        'heading' => 'Create A Note',
        'errors' => $errors
    ]);
}

$db->query("INSERT INTO notes (body, user_id) VALUES (:body, :user_id)", [
    'body' => $body, 'user_id' => 1
]);

header('location: /notes');
die();