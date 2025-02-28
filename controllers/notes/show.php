<?php

use core\Database;

$user_id = 1;

$config = require(base_path('config.php'));
$db = new Database($config['database']);

$note = $db->query('select * from notes where id = ?', [
    $_GET['id']
])->findOrFail();

authorize($note['user_id'] == $user_id);

view('notes/show.view.php', [
    'heading' => 'Note',
    'note' => $note
]);