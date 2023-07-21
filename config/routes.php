<?php

/** @var $router */

const MIDDLEWARE = [
    'auth' => \myfrm\middleware\Auth::class,
    'guest' => \myfrm\middleware\Guest::class,
];

// Posts
$router->get('', 'posts/index.php');
$router->get('posts', 'posts/show.php');
$router->get('posts/create', 'posts/create.php')->only('auth');
$router->post('posts', 'posts/store.php');
$router->delete('posts', 'posts/destroy.php');

// Pages
$router->get('about', 'about.php');
$router->get('contact', 'contact.php');

// User
$router->add('register', 'users/register.php', ['get', 'post'])->only('guest');
//$router->post('register', 'users/store.php')->only('guest');
$router->get('login', 'users/login.php')->only('guest');
$router->get('logout', 'users/logout.php');

//dump($router->routes);