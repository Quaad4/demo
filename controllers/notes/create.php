<?php

$config = require(base_path('config.php'));
$db = new Database($config['database']);

$errors = [];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $body = $_POST['body'];

    if(!Validator::string($body, 1, 1000)) {
        $errors['body'] = 'The note description must be no more than 1000 characters is required.';
    }

    if(empty($errors)) {
        $query = "INSERT INTO notes (body, user_id) VALUES (:body, :user_id)";

        $db->query($query, ['body' => $body, 'user_id' => 1]);
    }
}

view('notes/create.view.php', [
    'heading' => 'Create A Note',
    'errors' => $errors
]);