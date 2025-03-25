<?php

use core\App;
use core\Database;

$db = App::resolve(Database::class);

$query = "select * from notes where user_id = 1";

$notes = $db->query($query)->get();

view('notes/index.view.php', [
    'heading' => 'My Notes',
    'notes' => $notes
]);