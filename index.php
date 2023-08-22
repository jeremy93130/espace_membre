<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/formulaire.css">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="formu.php">
        <div class="flex">
            <h1>Page d'inscription</h1>
            <div class="connexion">
                <button type="submit" name="connexion">Connexion</button>
            </div>
            <input type="email" name="email" placeholder="Votre email">
            <input type="text" name="pseudo" placeholder="Votre pseudo">
            <input type="password" name="mdp" placeholder="Mot de passe">
            <input type="password" name="confirmMdp" placeholder="Confirmation du mot de passe">
            <input type="file" name="files">
            <div>
                <button type="submit" name="inscription">Inscription</button>
            </div>
        </div>
    </form>
</body>

</html>