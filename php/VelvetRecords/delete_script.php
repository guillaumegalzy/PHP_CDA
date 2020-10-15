<?php 

//Ajout des classes nécessaires au bon fonctionnement du script
    require_once 'Disc.php';
    require_once 'DAO.php';
    require_once 'DiscDAO.php';

//Création d'un nouveau DAO
    $dao = new DiscDAO() ;

//Création d'une nouvelle instance de disque
    $disque = new Disc() ;

//Récupération de l'ID
    $id = $_GET['id'];

    $disque->setDiscId($id);

    $dao->delete($disque);

//Redirection vers la liste des vinyles

    header("Location: index.php");
?>