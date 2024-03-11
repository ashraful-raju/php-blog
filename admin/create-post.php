<?php
require_once '../init.php';
require_once '../inc/header.php';
?>
<div>
    <h2 class="mx-auto text-center text-xl font-bold">Create your Article</h2>
    <form class="max-w-xl  mx-auto" action="/actions/post-submit.php" method="post" enctype="multipart/form-data">
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="border-l border-l-4 my-2 border-red-500 py-4 px-2 bg-gray-200">
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        <?php endif; ?>
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
        <input type="text" id="title" class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Title if your article" name="title" required />


        <label for="excerpt" class="block mb-2 text-sm font-medium text-gray-900">Excerption</label>
        <input type="text" id="excerpt" class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Enter Your User Name" name="excerpt" required />

        <label for="content" class="block mb-2 text-sm font-medium text-gray-900 ">Your Content</label>
        <textarea id="content" name="content" rows="4" class="mb-2 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write Your Content....."></textarea>

        <label class="block mb-2 text-sm font-medium text-gray-900" for="multiple_files">Upload files</label>
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none" name="image" id="multiple_files" type="file" multiple>
        <p class="mt-1 text-sm text-gray-500" id="file_input_help">SVG, PNG, JPG or GIF.</p>


        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto mt-5 px-5 py-2.5 text-center ">Submit</button>
    </form>
</div>
<?php

require_once '../inc/footer.php';
