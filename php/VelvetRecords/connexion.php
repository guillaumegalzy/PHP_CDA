<?php 
    try 
    {
        $db = new PDO("mysql:host=localhost;charset=utf8;dbname=record", "root", ""); //connexion à la bdd record, sans mot de passe
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // générer une exception à chaque fois qu'un problème est rencontré. Ne pas utiliser en production pour éviter les messages d'erreurs intempestifs

    } 
    catch (Exception $e) 
    {
        echo 'Erreur : ' . $e->getMessage() . '<br />';
        echo 'N° : ' . $e->getCode();
        die('Fin du script');
    } 

?>