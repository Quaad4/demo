<?php

use core\App;
use core\Database;

$user_id = 1;

$db = App::resolve(Database::class);

$note = $db->query('select * from notes where id = ?', [
    $_GET['id']
])->findOrFail();

authorize($note['user_id'] == $user_id);

view('notes/edit.view.php', [
    'heading' => 'Edit Note',
    'note' => $note,
    'errors' => []
]);