<?php 

//Verification des données soumises par le formulaire
    require_once 'verify_form.php';

//Connexion à la BDD
    require_once 'connexion.php';

//Ajout du nouveau vynile 
    //Préparation
        $sqlUpdateWithoutPicture = "UPDATE `disc` SET disc_title = :disc_title, disc_year = :disc_year, disc_label = :disc_label, disc_genre = :disc_genre, disc_price = :disc_price, artist_id = :artist_id WHERE disc_id = $disc_id";  
        
        $RequeteUpdate = $db->prepare($sqlUpdateWithoutPicture);

        $RequeteUpdate->bindValue(":disc_title", $disc_title, PDO::PARAM_STR);
        $RequeteUpdate->bindValue(":disc_year", $disc_year, PDO::PARAM_INT);
        $RequeteUpdate->bindValue(":disc_label", $disc_label, PDO::PARAM_STR);
        $RequeteUpdate->bindValue(":disc_genre", $disc_genre, PDO::PARAM_STR);
        $RequeteUpdate->bindValue(":disc_price", $disc_price, PDO::PARAM_INT);
        $RequeteUpdate->bindValue(":artist_id", $artist_id, PDO::PARAM_INT);
    
    //Execution
        $RequeteUpdate ->execute();

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
/*     header("Location: index.php"); */
?>