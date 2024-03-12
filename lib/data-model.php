<?php

// function to read or get the data file 
if (!function_exists('getArticles')) {
    function getArticles()
    {
        $data = file_get_contents(BASE_DIR . DS . 'data/articles.json');

        return json_decode($data, true);
    }
}

// function to create content
if (!function_exists('addArticle')) {
    function addArticle($data)
    {
        $items = getArticles();
        $items[] = $data;

        file_put_contents(
            BASE_DIR . DS . 'data/articles.json',
            json_encode($items)
        );
    }
}


// function to create content
if (!function_exists('updateArticle')) {
    function updateArticle($slug, $data)
    {
        $items = array_map(function ($item) use ($slug, $data) {
            if ($item['slug'] == $slug) {
                return $data;
            }
            return $item;
        }, getArticles());

        file_put_contents(
            BASE_DIR . DS . 'data/articles.json',
            json_encode($items)
        );
    }
}

// function to delete content
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

// function for get article by slug for showing full content
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

// function get or read user data
if (!function_exists('getUsers')) {
    function getUsers()
    {
        $data = file_get_contents(BASE_DIR . DS . 'data/users.json');

        return json_decode($data, true);
    }
}

// function for add users add put them to user data
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

// function for searching user in data file 
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
