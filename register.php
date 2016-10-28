<?php
/**
 * Created by IntelliJ IDEA.
 * User: doetken
 * Date: 28.10.2016
 * Time: 07:53
 */

session_start();

$db_host = 'localhost';
$db_name = 'bumpr';
$db_user = 'root';
$db_password = 'Fiete';
if (empty($pdo)) {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
}

?>

        <h1>Registrierung</h1>
        <?php
        $showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll

        if(isset($_GET['register'])) {
            $error = false;
            $benutzername = trim($_POST['benutzername']);
            $email = trim($_POST['email']);
            $passwort = $_POST['passwort'];
            $passwort2 = $_POST['passwort2'];

            if(empty($benutzername) || empty($email)) {
                echo 'Bitte alle Felder ausfüllen<br>';
                $error = true;
            }

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
                $error = true;
            }
            if(strlen($passwort) == 0) {
                echo 'Bitte ein Passwort angeben<br>';
                $error = true;
            }
            if($passwort != $passwort2) {
                echo 'Die Passwörter müssen übereinstimmen<br>';
                $error = true;
            }

            //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
            if(!$error) {
                $statement = $pdo->prepare("SELECT * FROM user WHERE email = :email");
                $result = $statement->execute(array('email' => $email));
                $user = $statement->fetch();

                if($user !== false) {
                    echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
                    $error = true;
                }
            }

            //Keine Fehler, wir können den Nutzer registrieren
            if(!$error) {
                $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);

                $statement = $pdo->prepare("INSERT INTO user (Benutzername, Passwort, EMail) VALUES (:benutzername, :passwort, :email)");
                $result = $statement->execute(array('email' => $email, 'passwort' => $passwort_hash, 'benutzername' => $benutzername));

                if($result) {
                    header("Location: index.php");
                    $showFormular = false;
                } else {
                    echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
                }
            }
        }

        if($showFormular) {
            ?>

            <form action="?register=1" method="post">

                <div class="form-group">
                    <label for="inputBenutzername">Benutzername:</label>
                    <input type="text" id="inputBenutzername" size="40" maxlength="250" name="benutzername" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="inputEmail">E-Mail:</label>
                    <input type="email" id="inputEmail" size="40" maxlength="250" name="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="inputPasswort">Dein Passwort:</label>
                    <input type="password" id="inputPasswort" size="40"  maxlength="250" name="passwort" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="inputPasswort2">Passwort wiederholen:</label>
                    <input type="password" id="inputPasswort2" size="40" maxlength="250" name="passwort2" class="form-control" required>
                </div>
                <button type="submit">Registrieren</button>
            </form>

            <?php
        } //Ende von if($showFormular)
        ?>
