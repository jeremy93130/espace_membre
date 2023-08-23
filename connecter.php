<?php
session_start();
require_once("database.php");

if (isset($_POST['connecter'])) {
    $pseudo = htmlspecialchars($_POST["pseudo"]);
    $mdp = htmlspecialchars($_POST["mdp"]);

    // Crypter le mdp :

    $mdpCrypt = password_hash($mdp, PASSWORD_DEFAULT);

    // Se connecter à la base de données : 

    $db = dBConnexion();

    // Préparation de la requête : 

    $request = $db->prepare("SELECT pseudonyme,mdp FROM membres WHERE pseudonyme = ?");
    // Execution de la requête 

    try {
        $request->execute([$pseudo]);
        $user = $request->fetch();
    } catch (PDOException $error) {
        echo $error->getMessage();
    }

    if (empty($user)) {
        echo "Pseudonyme ou Mdp inconnu";
        header('refresh: 2; http://localhost/espace_membre/connexion.php');
    } else {
        if (password_verify($mdp, $user["mdp"])) {
            // Créer les variables de session : 
            $_SESSION["id"] = $user['id_membres'];
            $_SESSION["pseudo"] = $user['pseudonyme'];
            $_SESSION["images"] = $user['images'];

            header("Location: page.php");
        } else {
            echo "Mot de passe incorrect";
            header('refresh: 2; http://localhost/espace_membre/connexion.php');
        }

    }

}

?>