<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
    $user = $_POST['username'];
    $password = sha1($_POST['password']);

    require 'server/config.php';
    require 'server/registration.php';

    $success = registration($user, $password);

    if ($success)
        header('Location: index.php');
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>bumpr</title>
    <link rel="stylesheet" href="style/style.css">
    <style>
        #info {
            color: red;
        }
        main {
            height: 180px;
        }
    </style>
</head>
<body>


<header>
    <h1>bumpr</h1>
</header>

<main>

    <form method="post">


        <div>
            <input type="text" placeholder="Benutzername" maxlength="30" size="24" name="username">
        </div>
        <div>
            <input type="password" placeholder="Passwort" maxlength="30" size="24" name="password">
        </div>
        <div>
            <input type="password" placeholder="Passwort wiederholen" maxlength="30" size="24">
        </div>
        <button>Registrieren</button>
    </form>
    <span id="info"></span>
</main>

<footer>

</footer>


<script src="scripts/registration.js"></script>
</body>
</html>