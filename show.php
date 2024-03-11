<?php
require_once 'init.php';

$article = getArticleBy($_GET['post'] ?? NULL);
if (!$article) {
    require_once '404.php';
    die;
}
$title = "Home";
require_once 'inc/header.php';
?>

<div>
    <?php if ($article['image']) : ?>
        <img src="<?= $article['image'] ?>" alt="Cover photo">
    <?php endif; ?>
    <h2 class="font-bold text-3xl mb-2"><?= $article['title'] ?></h2>
    <p class="excerpt pb-4"><?= $article['excerpt'] ?></p>

    <div class="mb-4">
        <!-- <a class="rounded-md bg-indigo-500 px-3 py-2 font-medium leading-4 text-white transition-all hover:bg-opacity-90" href="/11r/tag/cats">cats</a> -->
    </div>
    <p class="text-sm italic">Created on
        <span datetime="Thu Sep 18 2008 19:00:00 GMT-0500 (Central Daylight Time)"><?= date('d F, Y', $article['date']) ?></span>.
    </p>

    <div class="content mt-4 prose prose-sm">

        <?= nl2br(html_entity_decode($article['content']))
        ?>
    </div>
</div>

<?php

require_once 'inc/footer.php';
