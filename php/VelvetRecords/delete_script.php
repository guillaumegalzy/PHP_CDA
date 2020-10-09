<?php 

//Récupération de tous les éléments envoyés par le formulaire
    $id = $_GET['id'];

//Connexion à la BDD
    require_once 'connexion.php';

//Ajout du nouveau vynile 
    //Préparation
    $sqlDelete = "DELETE FROM disc where disc_id = $id";

    $RequeteDelete = $db->prepare($sqlDelete);

    //Execution de la requête
    $RequeteDelete ->execute();

//Redirection vers la liste des vinyles

    header("Location: index.php");
?>