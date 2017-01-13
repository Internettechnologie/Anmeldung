<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>bumpr</title>
    <link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<header>
    <h1>bumpr</h1>
    <h2></h2>
</header>

<main>

    <form>
        <div class="form-group">
            <label for="beispielFeldEmail1">Email-Adresse</label>
            <input type="email" class="form-control" id="beispielFeldEmail1" placeholder="Email-Adresse"
                   name="username">
        </div>
        <div class="form-group">
            <label for="beispielFeldPasswort1">Passwort</label>
            <input type="password" class="form-control" id="beispielFeldPasswort1" placeholder="Passwort"
                   name="password">
        </div>
        <div class="form-group">
            <p class="help-block">Noch nicht registriert? <a href="registration.php">Hier</a> anmelden!</p>
        </div>
        <button type="submit" class="btn btn-default">Abschicken</button>
    </form>


</main>

<footer>

</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>