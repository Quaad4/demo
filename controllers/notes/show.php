<?php

$config = require(base_path('config.php'));

$db = new Database($config['database']);

$query = "select * from notes where id = ?";

$note = $db->query($query, [$_GET['id']])->findOrFail();
$user_id = 1;

authorize($note['user_id'] == $user_id);

view('notes/show.view.php', [
    'heading' => 'Note',
    'note' => $note
]);