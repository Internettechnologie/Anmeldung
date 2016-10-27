<?php
/**
 * Created by IntelliJ IDEA.
 * User: doetken
 * Date: 27.10.2016
 * Time: 09:14
 */

$user = 'test';
$pass = 'test';
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<header>
    <h1>
        Anmeldung
    </h1>
</header>
<main>
    <form action="index.php">
        <span>Benutzername:    </span>

        <input type="text" placeholder="Name" name="nutzer" value="<?php $user ?>">

        <br>
        <span>Passwort: </span>
        <input type="text" placeholder="Passwort" name="pass" value="<?php $pass ?>">
        <br>
        <button type="submit" placeholder="Login" name="login" value="login">
    </form>

    <?php
    if (isset($user) && isset($pass)) {
//        todo Datenbankverbindung und select + Login durchführen
        login($user, $pass);
    }
    function login($nutzer, $passwort)
    {
        echo $nutzer+"   "+$passwort;
    }

    ?>

</main>

</body>
</html>
