<?php
require_once('database.php');


if (isset($_POST['inscription'])) {
    $email = htmlspecialchars($_POST["email"]);
    $pseudo = htmlspecialchars($_POST["pseudo"]);
    $mdp = htmlspecialchars($_POST["mdp"]);
    $file = htmlspecialchars($_POST["files"]);
    $confirm = htmlspecialchars($_POST["confirmMdp"]);


    if (empty($email) || empty($pseudo) || empty($mdp) || empty($confirm)) {
        echo "<p> Merci de remplir tous les champs";
    } else if ($mdp !== $confirm) {
        echo "<p> Les mots de passe ne correspondent pas !";
    }

    // Crypter le mdp :

    $mdpCrypt = password_hash($mdp, PASSWORD_DEFAULT);

    // Se connecter à la base de données : 

    $db = dBConnexion();

    // Préparation de la requête : 

    $request = $db->prepare("INSERT INTO membres (email,pseudonyme,mdp,images) VALUES (?,?,?,?)");

    // Execution de la requête 

    try{
        $request->execute(array($email, $pseudo, $mdp, $file));
    } catch(PDOException $error){
        echo $error->getMessage();
    }
}


?>