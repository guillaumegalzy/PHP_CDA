<?php 
    session_start();

    $_SESSION['login']= $_REQUEST['Email'];
    $_SESSION['password']= password_hash($_REQUEST['Password'],PASSWORD_DEFAULT); //Hashage du mdp
    $_SESSION['lastname']= $_REQUEST['lastname'];
    $_SESSION['firstname']= $_REQUEST['firstname'];


    if($_SESSION['login'] == 'admin'){
        $_SESSION['auth'] = 'OK';
    } else {
        unset($_SESSION['auth']);
        unset($_SESSION['login']);
        unset($_SESSION['password']);
    }

    /* var_dump($_REQUEST); */


    //Redirection vers la page précédente
    header("Location: ".$_REQUEST['PreviousPage']);
?>

