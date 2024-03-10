<?php
if (!function_exists('getArticles')) {
    function getArticles()
    {
        $data = file_get_contents(BASE_DIR . DS . 'data/articles.json');

        return json_decode($data, true);
    }
}

if (!function_exists('deleteArticle')) {
    function deleteArticle($slug)
    {
        $items = getArticles();
        $articles = array_filter($items, function ($item) use ($slug) {
            return $item['slug'] !== $slug;
        });

        file_put_contents(
            BASE_DIR . DS . 'data/articles.json',
            json_encode($articles)
        );
    }
}


if (!function_exists('getArticleBy')) {
    function getArticleBy($slug)
    {
        $data = getArticles();
        foreach ($data as $item) {
            if ($item['slug'] === $slug) {
                return $item;
            }
        }
        return null;
    }
}

if (!function_exists('getUsers')) {
    function getUsers()
    {
        $data = file_get_contents(BASE_DIR . DS . 'data/users.json');

        return json_decode($data, true);
    }
}

if (!function_exists('addUser')) {
    function addUser($name, $username, $password)
    {
        $users = getUsers();
        $password = md5($password);
        $users[] = compact('name', 'username', 'password');
        file_put_contents(
            BASE_DIR . DS . 'data/users.json',
            json_encode($users)
        );
    }
}

if (!function_exists('getUserBy')) {
    function getUserBy($username)
    {
        $data = getUsers();
        foreach ($data as $user) {
            if ($user['username'] === $username) {
                return $user;
            }
        }
        return null;
    }
}
