<?php
require_once '../init.php';


if (is_post()) {
    $title = senitize($_POST['title']);
    $excerpt = senitize($_POST['excerpt']);
    $content = senitize($_POST['content']);
    $imagePath = "";

    if (isset($_FILES['image'])) {
        $imagePath = '/uploads/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], BASE_DIR . $imagePath);
    }

    $slug = generateSlug($title);
    if ($title && $excerpt && $content && !getArticleBy($slug)) {

        addArticle([
            'title' => $title,
            'slug' => $slug,
            'excerpt' => $excerpt,
            'content' => $content,
            'image' => $imagePath,
            'date' => time()
        ]);

        $_SESSION['error'] = "Article created succefully!";
    } else {
        $_SESSION['error'] = "Invalid data given or already exist!";
        redirect('admin/create-post.php');
    }
}

redirect('admin');
