<?php

global $db;
/**
 * @var Db $db
 */

$title = 'My Blog :: Home';

$posts = $db->query("SELECT * FROM posts ORDER BY id DESC")->findAll();
$recent_posts = $db->query("SELECT * FROM posts ORDER BY id DESC LIMIT 3")->findAll();

require_once VIEWS . '/posts/index.tpl.php';
