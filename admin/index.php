<?php
require_once '../init.php';

if (!is_loggedin()) {
    redirect('login.php');
}

$articles = getArticles();

require_once '../inc/header.php';
?>

<div class="flex justify-between items-center">
    <h1 class="text-3xl mb-4 font-bold">Post list</h1>
    <a class="underline" href="/admin/create-post.php">Create Post</a>
</div>

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Post title
                </th>
                <th scope="col" class="px-6 py-3">
                    Excerpt
                </th>
                <th scope="col" class="px-6 py-3">
                    Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article) : ?>
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        <?= $article['title'] ?>
                    </th>
                    <td class="px-6 py-4">
                        <?= $article['excerpt'] ?>
                    </td>
                    <td class="px-6 py-4">
                        <?= date('d M, Y h:sa', $article['date']) ?>
                    </td>
                    <td class="px-6 py-4">
                        <a href="/admin/edit-post.php?slug=<?= $article['slug'] ?>">Edit</a> | <a href="/actions/delete-post.php?slug=<?= $article['slug'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once '../inc/footer.php' ?>