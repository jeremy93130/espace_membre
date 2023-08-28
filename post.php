<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/page.css">
    <link rel="stylesheet" href="css/post.css">
    <title>Document</title>
</head>

<body>
    <?php include_once('nav.php'); ?>
    <form action="connecter.php" method="post" enctype="multipart/form-data">
        <input type="file" name="img">
        <textarea name="message" id="message" cols="30" rows="10" placeholder="votre texte ici"></textarea>
        <button name='publier' class="publish">Publier</button>
    </form>

</body>

</html>