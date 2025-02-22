<?php

$heading = 'My Notes';

$config = require('config.php');

$db = new Database($config['database']);

// $id = $_GET['id'];
$query = "select * from notes";

$notes = $db->query($query)->fetchAll();

require 'views/notes.view.php';