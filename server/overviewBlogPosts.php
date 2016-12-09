<?php


$blogposts = [];
$pdo = new PDO(DB_DATABASE, DB_USERNAME, DB_PASSWORD);

$statement = $pdo->prepare("SELECT content, timestamp, name FROM posts INNER JOIN users ON posts.user_id=users.id;");
$statement->execute();


$blogposts = $statement->fetchAll();


