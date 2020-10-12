<?php 

    $infos = array();
    $infos += $_REQUEST;
    $infos += $_FILES;

    /* var_dump($infos); */

    //Préparation des données pour insertion
    $disc_id = strip_tags($infos['id']);    
    $disc_title = strip_tags($infos['Title']);
    $disc_year= strip_tags($infos['Year']);
    $disc_picture= strip_tags($infos['Picture']['name']);
    $disc_label = strip_tags($infos['Label']);
    $disc_genre = strip_tags($infos['Genre']);
    $disc_price= floatval(strip_tags($infos['Price']));
    $artist_id = strip_tags($infos['Artist']);

    //Création du tableau d'erreurs
    $errors = array();

//Contrôle des saisies
    $regexTitle="/^[A-z ]{1,50}$/";
    $testTitle= preg_match($regexTitle,$disc_title);
    if (!$testTitle){
        $errors['Title'] = "is-invalid";
        $count=1;
    } else {
        $errors['Title'] = "is-valid";
        $count=0;
    }

    $regexYear="/^[0-9]{4}$/";
    $testYear= preg_match($regexYear,$disc_year);
    if (!$testYear){
        $errors['Year'] = "is-invalid";
        $count++;
    } else {
        $errors['Year'] = "is-valid";
    }   

    $regexLabel="/^[A-z ]{1,50}$/";
    $testLabel= preg_match($regexLabel,$disc_label);
     if (!$testLabel){
        $errors['Label'] = "is-invalid";
        $count++;
    } else {
        $errors['Label'] = "is-valid";
    }   

    $regexGenre="/^[A-z ]{1,50}$/";
    $testGenre= preg_match($regexGenre,$disc_genre);
     if (!$testGenre){
        $errors['Genre'] = "is-invalid";
        $count++;
    } else {
        $errors['Genre'] = "is-valid";
    }   

    $regexPrice="/^[0-9]{1,4}(?:[.,][0-9]{1,2})?$/";
    $testPrice= preg_match($regexPrice,$disc_price);
     if (!$testPrice){
        $errors['Price'] = "is-invalid";
        $count++;
    } else {
        $errors['Price']= "is-valid";
    }   

    $regexArtist="/^[0-9]+$/";
    $testArtist= preg_match($regexArtist,$artist_id);
     if (!$testArtist){
        $errors['Artist'] = "is-invalid";
        $count++;
    } else {
        $errors['Artist']= "is-valid";
    }   

    $errors ['NbErrors'] = $count;
?>