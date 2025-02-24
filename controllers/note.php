<?php

$heading = 'Note';

$config = require('config.php');

$db = new Database($config['database']);

$query = "select * from notes where id = ?";

$note = $db->query($query, [$_GET['id']])->findOrFail();
$user_id = 3;

authorize($note['user_id'] == $user_id);

require 'views/note.view.php';