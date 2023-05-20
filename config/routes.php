<?php

/** @var $router */

// Posts
$router->get('', 'posts/index.php');
$router->get('posts', 'posts/show.php');
$router->get('posts/create', 'posts/create.php');
$router->post('posts', 'posts/store.php');
$router->delete('posts', 'posts/destroy.php');

// Pages
$router->get('about', 'about.php');
$router->get('contact', 'contact.php');


/*$routes = [
    '' => 'index.php',
    'about' => 'about.php',
    'post' => 'post.php',
    'posts/create' => 'post-create.php',
];*/
