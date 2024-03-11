<?php
require_once '../init.php';

// dd($_REQUEST);

if (is_post() && isset($_GET['slug'])) {
    $title = senitize($_POST['title']);
    $excerpt = senitize($_POST['excerpt']);
    $content = senitize($_POST['content']);
    $imagePath = "";

    if (isset($_FILES['image'])) {
        $imagePath = '/uploads/' . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], BASE_DIR . $imagePath)) {
            $article = getArticleBy($_GET['slug']);
            unlink(BASE_DIR . $article['image']);
        }
    }
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
