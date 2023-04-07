<?php

require CONFIG . '/routes.php';

$uri = trim(parse_url($_SERVER['REQUEST_URI'])['path'], '/');

if (array_key_exists($uri, $routes)) {
    if (file_exists(CONTROLLERS . "/{$routes[$uri]}")) {
        require CONTROLLERS . "/{$routes[$uri]}";
    } else {
        abort();
    }
} else {
    abort();
}
