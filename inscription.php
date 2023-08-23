<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/inscription.css">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="formu.php" enctype="multipart/form-data">
        <div class="lion">

        </div>
        <div class="flex">
            <h1>Inscription</h1>
            <div class="connexion">
                <button type="button" name="connexion"><a href="connexion.php">Connexion</a></button>
            </div>
            <input type="email" name="email" placeholder="Votre email" required>
            <input type="text" name="pseudo" placeholder="Votre pseudo" required>
            <input type="password" name="mdp" placeholder="Mot de passe" required>
            <input type="password" name="confirmMdp" placeholder="Confirmation du mot de passe" required>
            <input type="file" name="image">
            <div class="buttons">
                <button type="submit" name="inscription">valider</button>
                <button type="button"><a href="index.php">retour</a></button>
            </div>
        </div>
    </form>
</body>

</html>