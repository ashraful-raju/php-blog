<?php
require_once '../init.php';
require_once '../inc/header.php';

$article = getArticleBy($_GET['slug'] ?? '');
?>
<div>
    <h2 class="mx-auto text-center text-xl font-bold">Edit your Article</h2>
    <form class="max-w-xl  mx-auto" action="/actions/post-update.php?slug=<?= $article['slug'] ?>" method="post">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
        <input type="text" id="title" class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Title if your article" name="title" value="<?= $article['title'] ?>" required />


        <label for="excerpt" class="block mb-2 text-sm font-medium text-gray-900">Excerption</label>
        <input type="text" id="excerpt" class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Enter Your User Name" name="excerpt" value="<?= $article['excerpt'] ?>" required />

        <label for="content" class="block mb-2 text-sm font-medium text-gray-900 ">Your Content</label>
        <textarea id="content" name="content" rows="4" class="mb-2 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write Your Content....."><?= $article['content'] ?></textarea>

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto mt-5 px-5 py-2.5 text-center ">Update</button>
    </form>
</div>
<?php

require_once '../inc/footer.php';
