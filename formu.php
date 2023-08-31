<?php

session_start();
require_once('database.php');


if (isset($_POST['inscription'])) {
    $email = htmlspecialchars($_POST["email"]);
    $pseudo = htmlspecialchars($_POST["pseudo"]);
    $mdp = htmlspecialchars($_POST["mdp"]);
    $confirm = htmlspecialchars($_POST["confirmMdp"]);



    if (empty($email) || empty($pseudo) || empty($mdp) || empty($confirm)) {
        echo "<p> Merci de remplir tous les champs";
    } else if ($mdp !== $confirm) {
        echo "<p> Les mots de passe ne correspondent pas !";
    } else {
        echo "<p> Inscription reussie </p>";
        header("Refresh: 2;http://localhost/espace_membre/connexion.php");
    }


    // Crypter le mdp :

    $mdpCrypt = password_hash($mdp, PASSWORD_DEFAULT);

    //Envoi des images au serveur (local)



    $imgName = $_FILES['image']['name']; // Nom de l'image envoyée   
    // $imgName = $imgName . uniqid();
    $tmpName = $_FILES['image']['tmp_name']; //Localisation temporaire sur le serveur

    $destination = $_SERVER['DOCUMENT_ROOT'] . "/espace_membre/img/" . $imgName;
    // echo $destination;
    move_uploaded_file($tmpName, $destination);
    // Se connecter à la base de données : 

    $db = dBConnexion();

    // Préparation de la requête : 

    $request = $db->prepare("INSERT INTO membres (email,pseudonyme,mdp,images) VALUES (?,?,?,?)");

    // Execution de la requête 
    // echo "<pre>";
    // print_r($mdpCrypt);

    // echo "<pre>";
    try {
        $request->execute(array($email, $pseudo, $mdpCrypt, $imgName));
    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}


?>