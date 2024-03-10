<?php

require_once '../init.php';

if (!is_loggedin()) {
    redirect('login.php');
}

$slug = senitize($_GET['slug']);

deleteArticle($slug);

redirect('admin');
