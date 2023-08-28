<?php
session_start(); // à mettre avant le html pour démarrer une session

if (!isset($_SESSION['id'])) { // Verifie qu'une session est active , sinon , renvoi vers la page de connexion.
    header("Location: connexion.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="formu.php">
        <div class="lion"></div>
        <div class="flex">
            <h1>Site</h1>
            <div class="connexion">
                <button type="submit" name="connexion"><a href="connexion.php">Connexion</a></button>
            </div>
            <div>
                <button type="submit" name="inscription"><a href="inscription.php">Inscription</a></button>

            </div>
        </div>
    </form>
</body>

</html>