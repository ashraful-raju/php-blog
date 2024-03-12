<?php
require_once '../init.php';

// add login functionality here

if (is_post()) {
    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);

    $user = getUserBy($username);

    if ($user && $user['password'] == md5($password)) {
        set_login(true);
        redirect('admin');
    } else {
        $_SESSION['error'] = 'Wrong User name or Password';
    }
}

redirect('login.php');
