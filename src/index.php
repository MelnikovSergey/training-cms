<?php

include_once 'config/Database.php';
include_once 'controllers/Articles.php';

$database = new Database();
$db = $database->getConnection();

$article = new Articles($db);
$result = $article->getArticles();
