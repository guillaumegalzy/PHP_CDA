<?php
    //Ouverture de la session pour stockage
    session_start();
    
    if(isset($_SESSION['auth'])){
        if ($_SESSION['auth'] === 'OK'){
            $HideWhenLogged= "hidden";
            $ShowWhenLogged= "";
        }
    } else {
        $HideWhenLogged= "";
        $ShowWhenLogged= "hidden";
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Velvet Records</title>
</head>

<div class="container row">
    <form action="login_form.php" method="GET" <?= $HideWhenLogged?>>
        <button type="submit" class="btn btn-primary ml-3" >Log In</button>
    </form>

    <form action="signin_form.php" method="GET" <?= $HideWhenLogged?>>
        <button type="submit" class="btn btn-primary ml-3" >Sign In</button>
    </form>

    <form action="logout_script.php" method="GET" <?= $ShowWhenLogged?>> <!-- Supprime les données de connexions -->
        <button type="submit" class="btn btn-primary" >Log Out</button>
    </form>
  
</div>