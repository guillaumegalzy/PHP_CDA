<?php 
    session_start();

    //Verification des données soumises par le formulaire
    require_once 'verify_form.php';

    if ($errors['NbErrors'] > 0){
        $_SESSION['errorsForm'] = $errors;
        $_SESSION['infos']= $infos; // Renvoi des infos transmises pour réutilisation dans les champs
        header('Location: add_form.php'); // Retour au formulaire de modification

    } else {

//Préparation des données pour insertion
    $disc_title = strip_tags($infos['Title']);
    $disc_year= strip_tags($infos['Year']);
    $disc_picture= strip_tags($infos['Picture']['name']);
    $disc_label = strip_tags($infos['Label']);
    $disc_genre = strip_tags($infos['Genre']);
    $disc_price= strip_tags($infos['Price']);
    $artist_id = strip_tags($infos['Artist']);

//Contrôle des saisies
    $regexTitle="/[A-Za-z]+/";
    $testTitle= preg_match($regexTitle,$disc_title);

    $regexYear="/[0-9]{4}/";
    $testYear= preg_match($regexYear,$disc_year);

    $regexPicture="/[A-z]+/";
    $testPicture= preg_match($regexPicture,$disc_picture);

    $regexLabel="/[A-z]+/";
    $testLabel= preg_match($regexLabel,$disc_label);

    $regexGenre="/[A-z]+/";
    $testGenre= preg_match($regexGenre,$disc_genre);

    $regexPrice="/[0-9]{4}[0-9]{2}/";
    $testPrice= preg_match($regexPrice,$disc_price);

//Connexion à la BDD
    require 'connexion.php';

//Ajout du nouveau vynile 
    //Préparation
    $sqlAdd = "INSERT INTO `disc` (disc_title, disc_year, disc_picture, disc_label, disc_genre, disc_price, artist_id) VALUES (:disc_title, :disc_year, :disc_picture, :disc_label, :disc_genre, :disc_price, :artist_id)";

    $RequeteAdd = $db->prepare($sqlAdd);

    //Liaison des données SQL et PHP
        $RequeteAdd->bindValue(":disc_title", $disc_title, PDO::PARAM_STR);
        $RequeteAdd->bindValue(":disc_year", $disc_year, PDO::PARAM_INT);
        $RequeteAdd->bindValue(":disc_picture", $disc_picture, PDO::PARAM_STR);
        $RequeteAdd->bindValue(":disc_label", $disc_label, PDO::PARAM_STR);
        $RequeteAdd->bindValue(":disc_genre", $disc_genre, PDO::PARAM_STR);
        $RequeteAdd->bindValue(":disc_price", $disc_price);
        $RequeteAdd->bindValue(":artist_id", $artist_id, PDO::PARAM_INT);

    //Execution
    
    $RequeteAdd->execute();

  
// Gestion du fichier image
    //Récupération du nom du fichier
    $fileName = $disc_picture;
    $fileName = 'Drama.jpeg';

    // Recherche de tous les fichiers images potentiels portant l'ID du produit cible
    $fichiersExistant = glob('img/'.$fileName);
    var_dump($fichiersExistant);

   // Si un ou plusieurs fichiers portent ce même nom, le(s) supprimer, quelque soit son (leur) extension (png,jpg,pjeg,etc)
         if (sizeof($fichiersExistant) == 0 ){ // si pas de fichier trouvé, ne fait rien
         } else {
            foreach ($fichiersExistant as $fichier){  // parcout chaque fichier existant trouvé
                unlink($fichier); // supprime le fichier
            } 
         }

   // Ajout du nouveau fichier image portant l'ID du produit cible et la bonne extension de fichier
        move_uploaded_file($infos['Picture']['tmp_name'],'img/'.$fileName);
        echo '</br><p style="background-color:#339900; margin:0px;font-weight:light; color:white; font-size: 1.2rem">Création du fichier image portant le nom : '.$fileName.'.</p>';


    //Redirection vers la liste des vinyles
        header("Location: index.php");
    }
?>