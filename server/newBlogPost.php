<?php

if (isset($_POST['blogpost'])) {

    $content = $_POST['blogpost'];

    $pdo = new PDO(DB_DATABASE, DB_USERNAME, DB_PASSWORD);
    $statement = $pdo->prepare("INSERT INTO bumpr.posts (content, user_id) VALUES (?, ?)");
    $statement->execute([$content, $_SESSION['user_id']]);

    $pdo = null;

    header('Location: ./');
    exit();
}
