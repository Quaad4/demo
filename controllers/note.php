<?php

$heading = 'Note';

$config = require('config.php');

$db = new Database($config['database']);

$query = "select * from notes where id = ?";

$note = $db->query($query, [$_GET['id']])->fetch();

require 'views/note.view.php';