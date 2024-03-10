<?php
require_once 'init.php';
require_once 'inc/header.php';

if (is_loggedin()) {
    redirect('admin/');
}
?>
<h1 class="text-3xl text-center font-bold">Register here</h1>
<form class="max-w-sm mx-auto mt-6" action="actions/register-submit.php" method="post">
    <?php if (isset($_SESSION['error'])) : ?>
        <div class="border-l border-l-4 my-2 border-red-500 py-4 px-2 bg-gray-200">
            <?php
            echo $_SESSION['error'];
            unset($_SESSION['error']);
            ?>
        </div>
    <?php endif; ?>
    <div class="mb-5">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
        <input type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Enter Your Full Name" name="name" required />
    </div>
    <div class="mb-5">
        <label for="username" class="block mb-2 text-sm font-medium text-gray-900">User Name</label>
        <input type="text" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Enter Your User Name" name="username" required />
    </div>
    <div class="mb-5">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Your password</label>
        <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Enter Password" name="password" required />
    </div>


    <div class="flex justify-between">
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Submit</button>
        <a href="login.php">Back to Login</a>
    </div>
</form>
<?php

require_once 'inc/footer.php';
