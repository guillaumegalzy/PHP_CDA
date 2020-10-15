<?php 

//Ajout des classes nécessaires au bon fonctionnement du script
    require_once 'Disc.php';
    require_once 'DiscDAO.php';

//Création d'un nouveau DAO
    $dao = new DiscDAO() ;

//Création d'une nouvelle instance de disque
    $disque = new Disc() ;

    //Définition des valeurs pour chacun des attributs
    $disque->setTitle($disc_title);
    $disque->setYear($disc_year);
    $disque->setPicture($disc_picture);
    $disque->setLabel($disc_label);
    $disque->setGenre($disc_genre);
    $disque->setPrice($disc_price);
    $disque->setArtistId($artist_id);

//Ajout du nouveau vynile 
    $dao->insert($disque);

// Gestion du fichier image
    //Récupération du nom du fichier
    $fileName = $disc_picture;

    // Recherche de tous les fichiers images potentiels portant l'ID du produit cible
    $fichiersExistant = glob($fileName);

   // Si un ou plusieurs fichiers portent ce même nom, le(s) supprimer, quelque soit son (leur) extension (png,jpg,pjeg,etc)
         if (sizeof($fichiersExistant) == 0 ){ // si pas de fichier trouvé, ne fait rien
         } else {
            foreach ($fichiersExistant as $fichier){  // parcout chaque fichier existant trouvé
                unlink($fichier); // supprime le fichier
            } 
         }

   // Ajout du nouveau fichier image portant l'ID du produit cible et la bonne extension de fichier
        move_uploaded_file($_FILES['Picture']['tmp_name'],'img/'.$fileName);

    //Redirection vers la liste des vinyles
        header("Location: index.php");
?>