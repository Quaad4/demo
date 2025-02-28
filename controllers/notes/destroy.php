<?php

use core\Database;

$user_id = 1;

$config = require(base_path('config.php'));
$db = new Database($config['database']);

$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] == $user_id);

$db->query('delete from notes WHERE id = :id', [
    'id' => $_POST['id']
]);

header('location: /notes');
exit();