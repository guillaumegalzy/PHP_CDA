<?php 

//Gestion affichage des erreurs détectés lors de la validation côté serveur
    if(isset($_SESSION['errorsForm'])){
        $errorTitle = $_SESSION['errorsForm']['Title'];
        $errorYear = $_SESSION['errorsForm']['Year'];
        $errorGenre = $_SESSION['errorsForm']['Genre'];
        $errorLabel = $_SESSION['errorsForm']['Label'];
        $errorPrice = $_SESSION['errorsForm']['Price'];
        $errorArtist = $_SESSION['errorsForm']['Artist'];
        unset($_SESSION['errorsForm']); // Supprime les erreurs pour éviter l'apparition de nouveau des messages si retour sur le formulaire via un autre chemin
    } else{
        $errorTitle = "";
        $errorYear = "";
        $errorGenre = "";
        $errorLabel = "";
        $errorPrice = "";
        $errorArtist = "";
    }

    if(isset($_SESSION['infos'])){
        $_GET = $_SESSION['infos'];
        if(empty($_SESSION['infos']['Picture']['name'])){ // Si pas d'image chargée lors de la modification
            $_GET['Picture'] = $_SESSION['infos']['pictureUnchanged'];
        } else {
            $_GET['Picture'] = "img/".$_SESSION['infos']['Picture']['name'];
        }
        $_GET['artist_id'] = $_SESSION['infos']['Artist'];
        unset($_SESSION['infos']); // Supprime les infos pour éviter l'apparition de nouveau des messages si retour sur le formulaire via un autre chemin
    }
    
?>