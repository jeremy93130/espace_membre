<?php
require_once("database.php");
function getPost()
{
    $lesPost = null;
    $dbconnect = dBConnexion(); // Connexion à la base de données

    // Préparation de la requête :
    $request = $dbconnect->prepare("SELECT id_post, likes, membres_id, text, photo, id_membres, pseudonyme FROM posts, membres WHERE posts.membres_id = membres.id_membres");

    // Execution de la requête :
    try {
        $request->execute();
        //transformer les resultats de la recherche en tableau:
        $lesPost = $request->fetchAll();
    } catch (PDOException $error) {
        echo $error->getMessage();
    }
    return $lesPost; // Retourne la liste des posts 
}