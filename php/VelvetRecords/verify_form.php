<?php 

    $infos = array();
    $infos += $_REQUEST;
    $infos += $_FILES;

    //Préparation des données pour insertion
    $disc_id = strip_tags($infos['id']);    
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
    var_dump($testTitle);

    $regexYear="/[0-9]{4}/";
    $testYear= preg_match($regexYear,$disc_year);
    var_dump($testYear);

    $regexPicture="/[A-z]+/";
    $testPicture= preg_match($regexPicture,$disc_picture);
    var_dump($testPicture);

    $regexLabel="/[A-z]+/";
    $testLabel= preg_match($regexLabel,$disc_label);
    var_dump($testLabel);

    $regexGenre="/[A-z]+/";
    $testGenre= preg_match($regexGenre,$disc_genre);
    var_dump($testGenre);

    $regexPrice="/[0-9]{4}[0-9]{2}/";
    $testPrice= preg_match($regexPrice,$disc_price);
    var_dump($testPrice);
?>