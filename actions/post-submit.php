<?php
require_once '../init.php';


if (is_post()) {
    $title = senitize($_POST['title']);
    $excerpt = senitize($_POST['excerpt']);
    $content = senitize($_POST['content']);

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
