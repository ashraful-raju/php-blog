<?php
require_once '../init.php';

dd($_REQUEST);

if (is_post() && isset($_GET['slug'])) {
    $title = senitize($_POST['title']);
    $excerpt = senitize($_POST['excerpt']);
    $content = senitize($_POST['content']);

    $slug = generateSlug($title);

    if ($title && $excerpt && $content) {

        updateArticle($_GET['slug'], [
            'title' => $title,
            'slug' => $slug,
            'excerpt' => $excerpt,
            'content' => $content,
            'image' => $imagePath,
            'date' => time()
        ]);

        $_SESSION['error'] = "Article updated succefully!";
    } else {
        $_SESSION['error'] = "Invalid data given!";
    }
}

redirect('admin/edit-post.php?slug=' . $_GET['slug'] ?? '');
