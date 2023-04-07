<?php

$title = 'My Blog :: Home';

$posts = $db->query("SELECT * FROM posts ORDER BY id DESC")->fetchAll();
$recent_posts = $db->query("SELECT * FROM posts ORDER BY id DESC LIMIT 3")->fetchAll();

require_once VIEWS . '/index.tpl.php';
