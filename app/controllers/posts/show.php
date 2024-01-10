<?php

$db = \myfrm\App::get(\myfrm\Db::class);
//$id = $_GET['id'] ?? 0;
$slug = route_param('slug');

$post = $db->query("SELECT * FROM posts WHERE slug = ? LIMIT 1", [$slug])->findOrFail();
/* if (!$post) {
    abort();
} */

$title = "My Blog :: {$post['title']}";
require_once VIEWS . '/posts/show.tpl.php';
