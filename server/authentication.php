<?php

function checkUserLoginAllowed($user, $password)
{
    $pdo = new PDO(DB_DATABASE, DB_USERNAME, DB_PASSWORD);
    $statement = $pdo->prepare("SELECT COUNT(*) AS number from bumpr.users WHERE name = ? AND password = ?");
    $statement->execute([$user, $password]);
    $row = $statement->fetch();
    $number = $row['number'];

    if ($number == 1) {
        $_SESSION['login'] = true;
        $_SESSION['user_name'] = $user;

        $statement = $pdo->prepare("SELECT id from bumpr.users WHERE name = ? AND password = ?");
        $statement->execute([$user, $password]);
        $row = $statement->fetch();
        $_SESSION['user_id'] = $row['id'];
    }

    $pdo = null;
}



