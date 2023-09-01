<?php session_start();
// var_dump($_SESSION);
// var_dump($_COOKIE);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/connexion.css">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="connecter.php">
        <div class="lion">

        </div>
        <div class="flex">
            <h1>Connexion</h1>
            <?php if (isset($_SESSION['error'])) { ?>
                <p class="error">
                    <?php echo $_SESSION['error'] ?>
                </p>
            <?php } ?>
            <input type="text" name="pseudo" placeholder="Votre pseudo" required>
            <input type="password" name="mdp" placeholder="Mot de passe" required>
            <div class="buttons">
                <button type="submit" name="connecter">Se Connecter</button>
                <button type="button"><a href="inscription.php">inscription</a></button>
                <button type="button"><a href="index.php">retour</a></button>
            </div>
        </div>
    </form>
</body>

</html>