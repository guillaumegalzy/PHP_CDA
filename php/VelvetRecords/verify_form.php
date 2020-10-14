<?php 

    //Préparation des données pour vérification 
    $disc_title = strip_tags($_REQUEST['Title']);
    $disc_year= strip_tags($_REQUEST['Year']);
    $disc_picture= strip_tags($_FILES['Picture']['name']);
    $disc_label = strip_tags($_REQUEST['Label']);
    $disc_genre = strip_tags($_REQUEST['Genre']);
    $disc_price= strip_tags($_REQUEST['Price']);
    $artist_id = strip_tags($_REQUEST['Artist']);

    //Création du tableau d'erreurs multidimensionnel
    $errors = array('Title'=>null,'Year'=>null,'Label'=>null,'Genre'=>null,'Price'=>null,'Artist'=>null);

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
            $errors['Title'] = array('status'=>"is-invalid","Msg"=>"Please enter a valid title.");
        }else{
            $errors['Title'] = array('status'=>"is-valid","Msg"=>"");
        }
    
        $testArtist= preg_match($regexArtist,$artist_id);
        if (!$testArtist){
            $errors['Artist'] = array('status'=>"is-invalid","Msg"=>"Please select an artist from the list above.");
        }else{
            $errors['Artist'] = array('status'=>"is-valid","Msg"=>"");
        }

        $testYear= preg_match($regexYear,$disc_year);
        if (!$testYear){
            $errors['Year'] = array('status'=>"is-invalid","Msg"=>"Please enter a valid year (format YYYY).");
        }else{
            $errors['Year'] = array('status'=>"is-valid","Msg"=>"");
        }

        $testGenre= preg_match($regexGenre,$disc_genre);
        if (!$testGenre){
            $errors['Genre'] = array('status'=>"is-invalid","Msg"=>"Please enter a valid genre.");
        }else{
            $errors['Genre'] = array('status'=>"is-valid","Msg"=>"");
        }

        $testLabel= preg_match($regexLabel,$disc_label);
        if (!$testLabel){
            $errors['Label'] = array('status'=>"is-invalid","Msg"=>"Please enter a valid label.");
        }else{
            $errors['Label'] = array('status'=>"is-valid","Msg"=>"");
        }

        $testPrice= preg_match($regexPrice,$disc_price);
        if (!$testPrice){
            $errors['Price'] = array('status'=>"is-invalid","Msg"=>"Please enter a price => format {6,2}.");
        }else{
            $errors['Price'] = array('status'=>"is-valid","Msg"=>"");
        }

        if (empty($disc_picture)){
            $errors['Picture'] = array('status'=>"is-invalid","Msg"=>"Please upload a picture.");
        }else{
            $errors['Picture'] = array('status'=>"is-valid","Msg"=>"");
        }

    //Gestion affichage erreur classe Bootstrap
        $errorTitle = $errors['Title']['status'];
        $errorYear = $errors['Year']['status'];
        $errorGenre = $errors['Genre']['status'];
        $errorLabel = $errors['Label']['status'];
        $errorPrice = $errors['Price']['status'];
        $errorArtist = $errors['Artist']['status'];
        $errorPicture = $errors['Picture']['status'];
        
    //Gestion affichage message d'erreur
        $errorTitleMsg = $errors['Title']['Msg'];
        $errorYearMsg = $errors['Year']['Msg'];
        $errorGenreMsg = $errors['Genre']['Msg'];
        $errorLabelMsg = $errors['Label']['Msg'];
        $errorPriceMsg = $errors['Price']['Msg'];
        $errorArtistMsg = $errors['Artist']['Msg'];
        $errorPictureMsg = $errors['Picture']['Msg'];

    //Contrôle s'il existe une ou plusieurs erreurs
        foreach($errors as $error){
            if (in_array('is-invalid',$error)){
                $errorFind = true;
                break;
            }
        }

     
?>