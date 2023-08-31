<?php
session_start(); // à mettre avant le html pour démarrer une session
echo $_COOKIE['id_user'];
require_once('fonction.php');

if (!isset($_COOKIE['id_user'])) { // s'il n'y a pas de session active (aucun cookie)
    header("Location: connexion.php");
}
$listPost = getPost(); // Récuperer la liste des posts
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/page.css">
    <link rel="stylesheet" href="./css/index.css">
    <script src="https://kit.fontawesome.com/c2e186b2d4.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <?php include_once("nav.php"); ?>
    <div class="container">
        <?php foreach ($listPost as $post) { ?>
            <div class="post">
                <h1>
                    <?= $post["pseudonyme"]; ?>
                </h1>
                <div class="postimg">
                    <img src="img/<?= $post['photo']; ?>" alt="image publication">
                </div>
                <p>
                    <?= $post['text']; ?>
                </p>
                <span>
                    <?= $post['likes']; ?>
                </span>
                <!-- <button>like</button> -->
                <a href="connecter.php?idpost=<?= $post['id_post'] ?>"><i class="fa-regular fa-thumbs-up"></i></a>
            </div>
        <?php } ?>
    </div>
</body>

</html>