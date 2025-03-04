<?php

$_SESSION['name'] = 'Alex';

view('index.view.php', [
    'heading' => 'Home'
]);