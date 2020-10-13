<?php 
    session_start();

    unset($_SESSION['auth']);
    unset($_SESSION['login']);
    unset($_SESSION['password']);

    //Redirection vers la page précédente
    header("Location: ".$_REQUEST['PreviousPage']);
?>

