<?php

$heading = 'Note';

$config = require('config.php');

$db = new Database($config['database']);

$query = "select * from notes where id = ?";

$note = $db->query($query, [$_GET['id']])->fetch();
$user_id = 3;

if(!$note) {
    abort();
}

if($note['user_id'] != $user_id) {
    abort(Response::FORBIDDEN);
}

require 'views/note.view.php';