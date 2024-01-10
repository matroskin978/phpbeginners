<?php

/** @var $router */

const MIDDLEWARE = [
    'auth' => \myfrm\middleware\Auth::class,
    'guest' => \myfrm\middleware\Guest::class,
];

// Posts
$router->get('', 'posts/index.php');
$router->get('posts/create', 'posts/create.php')->only('auth');
$router->get('posts/(?P<slug>[a-z0-9-]+)', 'posts/show.php');
$router->post('posts', 'posts/store.php');
$router->delete('posts', 'posts/destroy.php');

// Pages
$router->get('about', 'about.php');
$router->get('contact', 'contact.php');

// User
$router->add('register', 'users/register.php', ['get', 'post'])->only('guest');
//$router->post('register', 'users/store.php')->only('guest');
$router->add('login', 'users/login.php', ['get', 'post'])->only('guest');
$router->get('logout', 'users/logout.php')->only('auth');

//dump($router->routes);