<?php
require_once 'init.php';

$articles = getArticles();
$title = "Home";
require_once 'inc/header.php';
?>

<div>
    <?php foreach ($articles as $article) : ?>
        <div class="mb-8 w-full border-b border-dotted border-gray-300 pb-8">
            <h2 class="text-2xl font-bold hover:underline transition-all">
                <!-- show.php?post=article-habijabi -->
                <a class="block" href="show.php?post=<?= $article['slug'] ?>">
                    <?= $article['title'] ?>
                </a>
            </h2>

            <p class="excerpt pb-4">
                <?= $article['excerpt'] ?? '' ?>
            </p>


            <span class="created-date block md:float-right md:inline">
                <?= date('d F, Y', $article['date']) ?>
            </span>
        </div>
    <?php endforeach; ?>
</div>

<?php

require_once 'inc/footer.php';
