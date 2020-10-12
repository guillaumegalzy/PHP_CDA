<?php 
    session_start();
    
//Verification des données soumises par le formulaire
    require_once 'verify_form.php';

    if ($errors['NbErrors'] > 0){
        $_SESSION['errorsForm'] = $errors;
        $_SESSION['infos']= $infos; // Renvoi des infos transmises pour réutilisation dans les champs
        header('Location: update_form.php'); // Retour au formulaire de modification
    } else {
        //Connexion à la BDD
            require_once 'connexion.php';
        
            var_dump($disc_price);
        //Ajout du nouveau vynile 
            //Préparation
                $sqlUpdateWithoutPicture = "UPDATE `disc` SET disc_title = :disc_title, disc_year = :disc_year, disc_label = :disc_label, disc_genre = :disc_genre, disc_price = :disc_price, artist_id = :artist_id WHERE disc_id = $disc_id";  
                
                $RequeteUpdate = $db->prepare($sqlUpdateWithoutPicture);
        
                $RequeteUpdate->bindValue(":disc_title", $disc_title, PDO::PARAM_STR);
                $RequeteUpdate->bindValue(":disc_year", $disc_year, PDO::PARAM_INT);
                $RequeteUpdate->bindValue(":disc_label", $disc_label, PDO::PARAM_STR);
                $RequeteUpdate->bindValue(":disc_genre", $disc_genre, PDO::PARAM_STR);
                $RequeteUpdate->bindValue(":disc_price", $disc_price);
                $RequeteUpdate->bindValue(":artist_id", $artist_id, PDO::PARAM_INT);
            
            //Execution
            $RequeteUpdate ->execute();
            
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

    }

?>