<?php
session_start();
require_once("database.php");

if (isset($_POST['connecter'])) {
    $pseudo = htmlspecialchars($_POST["pseudo"]);
    $mdp = htmlspecialchars($_POST["mdp"]);

    // Se connecter à la base de données : 

    $db = dBConnexion();

    // Préparation de la requête : 

    $request = $db->prepare("SELECT * FROM membres WHERE pseudonyme = ?");
    // Execution de la requête 

    try {
        $request->execute([$pseudo]);
        $user = $request->fetch();
    } catch (PDOException $error) {
        echo $error->getMessage();
    }

    // Le tableau user contient les informations de la base de données sous forme de tableau (fetch converti l'objet en tableau)
    // $user = [
    // 'id' => '1',
    // 'pseudonyme' => 'jeremy',
    // 'mdp => '(mdp crypté)',
    // ]

    if (empty($user)) {
        // echo "Pseudonyme ou Mdp inconnu";
        $_SESSION['error'] = "Nom d'utilisateur ou Mot de passe incorrect"; // Ajouter le message d'erreur dans le tableau $_SESSION 
        header("Location: connexion.php"); // Redirection vers la page de connexion
    } else {
        // La fonction password_verify prend 2 paramètres : 
        // Le premier correspond à ce que l'utilisateur a tapé dans le formulaire,
        // le second ce qui est dans la base de données.
        if (password_verify($mdp, $user["mdp"])) {
            // la variable $_SESSION est un tableau 
            // Toutes les superglobales en php sont des tableaux
            // Créer les variables de session : 
            $_SESSION["id"] = $user['id_membres'];
            $_SESSION["pseudo"] = $user['pseudonyme'];
            $_SESSION["images"] = $user['images'];

            // Création du cookie qui va stocker l'identifiant de l'utilisateur pour permettre une meilleure expérience:
            // c'est à dire on va la connecter automatiquement après vérification du cookie:
            setcookie("id_user", $user['id_membres'], time() + 3600, '/', 'localhost', false, true);
            var_dump($_SESSION);
            var_dump($_COOKIE);

            // $_SESSION = [
            // 'id' => 1,
            // "pseudo" => "WassilaDors",
            // "img" => "sommeil-enfant-dormir.jpg"
            // ];

            header("Location: page.php");
        } else {
            $_SESSION['error'];
            header('refresh: 2; http://localhost/espace_membre/connexion.php');
        }

    }
}



// Pour la publication : 
if (isset($_POST['publier'])) {
    $message = htmlspecialchars($_POST['message']);

    $image_name = $_FILES['img']["name"];
    $tmp = $_FILES['img']['tmp_name'];
    $destination = $_SERVER['DOCUMENT_ROOT'] . "/espace_membre/img/" . $image_name;

    move_uploaded_file($tmp, $destination);


    // Connexion base de données : 
    $db = dBConnexion();

    // Préparation de la requete : 
    $request = $db->prepare('INSERT INTO posts (membres_id,photo,text) VALUES (?,?,?)');

    // Executer la requête :
    try {
        $request->execute(array($_SESSION['id'], $image_name, $message));
        header("Location: page.php");
    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}


if (isset($_GET["idpost"])) {
    $dbConnexion = dBConnexion(); // Connexion à la base de données

    // Prépare la requête :
    $request = $dbConnexion->prepare("SELECT likes FROM posts WHERE id_post=?");

    // Executer la requête : 
    $request->execute(array($_GET["idpost"]));

    // On récupère le résultat : 

    $likes = $request->fetch();

    // echo $likes['likes'];

    // Requête pour modifier le nombre de likes : 
    $request1 = $dbConnexion->prepare("UPDATE posts SET likes=? WHERE id_post = ?");

    // Execution de la requête : 
    $request1->execute(array($likes['likes'] + 1, $_GET['idpost']));
    echo "<script> location.href='index.php'</script>";
}
?>