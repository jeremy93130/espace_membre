<?php
session_start();
require_once("database.php");

// Se connecter à la base de données : 

$db = dBConnexion();

// Préparation de la requête : 

$request = $db->prepare("SELECT * FROM membres");

// Executer la requête : 

try {
    $request->execute();
    $members = $request->fetchAll();
} catch (PDOException $error) {
    $error->getMessage();
}


if (!isset($_SESSION['id'])) {
    header("Location: connexion.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/page.css">
    <title>page personnelle</title>
</head>

<body>

    <?php include_once('../espace_membre/nav.php'); ?>


</body>

</html>