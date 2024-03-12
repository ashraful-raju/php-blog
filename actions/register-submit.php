<?php
require_once '../init.php';


if (is_post()) {
    $name = sanitize($_POST['name']);
    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);

    if ($name && $username && $password && !getUserBy($username)) {
        addUser($name, $username, $password);

        $_SESSION['error'] = "Account created, login to continue!";
        redirect('login.php');
    } else {
        $_SESSION['error'] = "Invalid user data given or already exist!";
    }
}

redirect('register.php');
