<?php
require_once '../init.php';


if (is_post()) {
    $name = senitize($_POST['name']);
    $username = senitize($_POST['username']);
    $password = senitize($_POST['password']);

    if ($name && $username && $password && !getUserBy($username)) {
        addUser($name, $username, $password);

        $_SESSION['error'] = "Account created, login to continue!";
        redirect('login.php');
    } else {
        $_SESSION['error'] = "Invalid user data given or already exist!";
    }
}

redirect('register.php');
