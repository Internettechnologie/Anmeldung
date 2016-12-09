<?php

function registration($username, $password)
{
    $success = false;
    $pdo = new PDO(DB_DATABASE, DB_USERNAME, DB_PASSWORD);

    $statement = $pdo->prepare("SELECT COUNT(*) AS number from bumpr.users WHERE name = ?");
    $statement->execute([$username]);
    $row = $statement->fetch();
    $number = $row['number'];


    if ($number == 0) {
        $statement = $pdo->prepare("INSERT INTO bumpr.users (name, password) VALUES (?, ?)");
        $statement->execute([$username, $password]);
        $success = true;
    }

    $pdo = null;
    return $success;
}

