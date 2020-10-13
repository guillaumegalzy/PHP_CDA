<?php 

    $infos = array();
    $infos += $_REQUEST;
    $infos += $_FILES;

    var_dump($infos);

    //Préparation des données pour insertion
    $disc_id = strip_tags($infos['id']);    
    $disc_title = strip_tags($infos['Title']);
    $disc_year= strip_tags($infos['Year']);
    $disc_picture= strip_tags($infos['Picture']['name']);
    $disc_label = strip_tags($infos['Label']);
    $disc_genre = strip_tags($infos['Genre']);
    $disc_price= strip_tags($infos['Price']);
    $artist_id = strip_tags($infos['Artist']);

    //Création du tableau d'erreurs multidimensionnel
    $errors = array('Title'=>null,'Year'=>null,'Label'=>null,'Genre'=>null,'Price'=>null,'Artist'=>null);

//Contrôle des saisies
    //Déclaration des Regexp
        $regexTitle="/^[A-z ]{1,50}$/";
        $regexYear="/^[0-9]{4}$/";
        $regexLabel="/^[A-z ]{1,50}$/";
        $regexGenre="/^[A-z ]{1,50}$/";
        $regexPrice="/^[0-9]{1,4}(?:[.,][0-9]{1,2})?$/";
        $regexArtist="/^[0-9]+$/";

    //Vérification des champs
        $testTitle= preg_match($regexTitle,$disc_title);
        if (!$testTitle){
            $errors['Title'] = array('status'=>"is-invalid","error"=>"Please enter a valid title.");
        }
    
        $testArtist= preg_match($regexArtist,$artist_id);
        if (!$testArtist){
            $errors['Artist'] = array('status'=>"is-invalid","error"=>"Please select an artist from the list above.");
        }  

        $testYear= preg_match($regexYear,$disc_year);
        if (!$testYear){
            $errors['Year'] = array('status'=>"is-invalid","error"=>"Please enter a valid year (format YYYY).");
        }  

        $testGenre= preg_match($regexGenre,$disc_genre);
        if (!$testGenre){
            $errors['Genre'] = array('status'=>"is-invalid","error"=>"Please enter a valid genre.");
        }   

        $testLabel= preg_match($regexLabel,$disc_label);
        if (!$testLabel){
            $errors['Label'] = array('status'=>"is-invalid","error"=>"Please enter a valid label.");
        }  

        $testPrice= preg_match($regexPrice,$disc_price);
        if (!$testPrice){
            $errors['Price'] = array('status'=>"is-invalid","error"=>"Please enter a price => format {6,2}.");
        }  
?>