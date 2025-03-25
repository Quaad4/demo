<?php

use core\App;
use core\Database;
use http\forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if(! $form->validate($email, $password)) {
    return view('sessions/create.view.php', [
        'errors' => $form->errors()
    ]);
}; 

$db = App::resolve(Database::class);

$user = $db->query('SELECT * FROM users WHERE email = ?', [
    $email
])->find();

if($user) {
    if(password_verify($password, $user['password'])) {
        login([
            'email' => $email
        ]);
    
        header('location: /');
        exit();
    }    
}

return view('sessions/create.view.php', [
    'errors' => [
        'email' => 'No matching account found for that email address and password'
    ]
]);

?>