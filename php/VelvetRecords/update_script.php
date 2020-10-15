<?php 
    
   //Ajout des classes nécessaires au bon fonctionnement du script
   require_once 'Disc.php';
   require_once 'DiscDAO.php';

    //Création d'un nouveau DAO
    $dao = new DiscDAO() ;

    //Création d'une nouvelle instance de disque
   $disque = new Disc() ;
    
    //Ajout du nouveau vynile 
        $disc_id= $_REQUEST['id'];

    //Définition des valeurs pour chacun des attributs
        $disque->setTitle($disc_title);
        $disque->setYear($disc_year);
        $disque->setPicture($disc_picture);
        $disque->setLabel($disc_label);
        $disque->setGenre($disc_genre);
        $disque->setPrice($disc_price);
        $disque->setArtistId($artist_id);
        $disque->setDiscId($disc_id);

    //MàJ du nouveau vynile 
        $dao->update($disque);

        
    //Gestion spécififique de l'image
        if($disc_picture != ""){
            //Préparation
            $sqlUpdatePicture = "UPDATE `disc` SET disc_picture = :disc_picture WHERE disc_id = $disc_id";
    
            $RequeteUpdatePicture = $db->prepare($sqlUpdatePicture);
    
            //Liaison des données SQL et PHP
            $RequeteUpdatePicture->bindValue(":disc_picture", $disc_picture, PDO::PARAM_STR);
    
            //Execution
            $RequeteUpdatePicture ->execute();
        }
    
    //Redirection vers la liste des vinyles
        header("Location: index.php");

?>