<?php

use core\App;
use core\Database;
use core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if(!Validator::email($email)) {
  $errors['email'] = "Please provide a valid email";
}

if(!Validator::string($password, 7, 255)) {
    $errors['password'] = "Please provide a valid password with at least 7 characters";
}

if(!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query('SELECT * FROM users WHERE email = ?', [
    $email
])->find();

if($user) {
    $errors['email'] = 'This email has already been taken. Please enter a new email.';
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$db->query('INSERT INTO users (email, password) VALUES (?, ?)',[ 
    $email,
    password_hash($password, PASSWORD_DEFAULT)
]);

$_SESSION['user'] = [
    'email' => $email
];

header('location: /');
die();