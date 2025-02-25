<?php

require 'Validator.php';

$heading = 'Create A Note';

$config = require('config.php');
$db = new Database($config['database']);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];
    $body = $_POST['body'];

    if(!Validator::string($body, 1, 1000)) {
        $errors['body'] = 'The note description must be no more than 1000 characters is required.';
    }

    if(empty($errors)) {
        $query = "INSERT INTO notes (body, user_id) VALUES (:body, :user_id)";

        $db->query($query, ['body' => $body, 'user_id' => 1]);
    }
}

require 'views/note-create.view.php';