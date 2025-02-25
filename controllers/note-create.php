<?php

$heading = 'Create A Note';

$config = require('config.php');
$db = new Database($config['database']);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];

    $body = $_POST['body'];
    if(!strlen(trim($body))) {
        $errors['body'] = 'A body is required';
    }

    if(strlen(trim($body)) > 1000) {
        $errors['body'] = 'A body can not be more than 1,000 characters.';
    }

    if(empty($errors)) {
        $query = "INSERT INTO notes (body, user_id) VALUES (:body, :user_id)";

        $db->query($query, ['body' => $body, 'user_id' => 1]);
    }
}

require 'views/note-create.view.php';