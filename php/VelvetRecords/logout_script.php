<?php 
    session_start();
    
    unset($_SESSION['auth']);
    session_destroy();

    //Redirection vers la page précédente
    header("Location: index.php");
?>

