<?php

$heading = 'Create A Note';

$config = require('config.php');
$db = new Database($config['database']);

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $body = $_POST['body'];
    $query = "INSERT INTO notes (body, user_id) VALUES (:body, :user_id)";

    $db->query($query, ['body' => $body, 'user_id' => 1]);
}

require 'views/note-create.view.php';