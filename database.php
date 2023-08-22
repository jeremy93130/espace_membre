<?php
function dBConnexion()
{
    $connexionDB = null; // Variable qui doit stocker notre instance de connexion à la base de données

    try { // Essaye de se connecter à la base de données

        $connexionDB = new PDO("mysql:host=localhost;dbname=cours_db", "root", ""); // On récupère l'objet de connexion à la base de données dans la variable $connexionDB

    } catch (PDOException $error) { // Si la connexion echoue

        $connexionDB = $error; // On récupère notre erreur dans $connexionDb

    }
    return $connexionDB; // Retourne l'objet PDO (avec ou sans erreur)
}


?>