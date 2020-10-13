<?php 
    session_start();

    $_SESSION['login']= strip_tags($_REQUEST['Email']);
    $_SESSION['password']= password_hash($_REQUEST['Password'],PASSWORD_DEFAULT); //Hashage du mdp

    require_once('connexion.php');

    $sqlFindUser = "SELECT * FROM user WHERE email = :email";

    $RequeteUser = $db-> prepare($sqlFindUser);
    $RequeteUser->bindValue(":email", $_SESSION['login'], PDO::PARAM_STR);
    $RequeteUser = $db->query($sqlFindUser);
    $ListUsers = $RequeteUse->fetchAll(PDO::FETCH_OBJ);
    $RequeteUser->closeCursor();

    var_dump($ListUsers);




    if($_SESSION['login'] == 'admin'){
        $_SESSION['auth'] = 'OK';
    } else {
        unset($_SESSION['auth']);
        unset($_SESSION['login']);
        unset($_SESSION['password']);
    }










    //Redirection vers la page précédente
   /*  header("Location: ".$_REQUEST['PreviousPage']); */
?>

