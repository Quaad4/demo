<?php

use core\App;
use core\Database;
use core\Validator;

$user_id = 1;
$errors = [];
$body = $_POST['body'];

$db = App::resolve(Database::class);

$note = $db->query('select * from notes where id = ?', [
    $_POST['id']
])->findOrFail();

authorize($note['user_id'] == $user_id);

if(!Validator::string($body, 1, 1000)) {
    $errors['body'] = 'The note description is required and must be no more than 1000 characters.';
}

if(!empty($errors)) {
    view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'note' => $note,
        'errors' => $errors
    ]);
}

$db->query('UPDATE notes SET body = ? where id = ?', [
    $body,
    $_POST['id']
]);

header('location: /notes');
die();