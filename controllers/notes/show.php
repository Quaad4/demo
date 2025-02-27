<?php

use core\Database;

$config = require(base_path('config.php'));
$db = new Database($config['database']);

$user_id = 1;

// Deleting
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $query = "select * from notes where id = :id";
    $note = $db->query($query, [
        'id' => $_POST['id']
    ])->findOrFail();
    
    authorize($note['user_id'] == $user_id);

    $db->query('delete from notes WHERE id = :id', [
        'id' => $_POST['id']
    ]);

    header('location: /notes');
    exit();

} else {
    $user_id = 1;

    $query = "select * from notes where id = ?";

    $note = $db->query($query, [$_GET['id']])->findOrFail();
    
    authorize($note['user_id'] == $user_id);
    
    view('notes/show.view.php', [
        'heading' => 'Note',
        'note' => $note
    ]);
}