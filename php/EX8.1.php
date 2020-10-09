<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>EX 8 - Les formulaires </title>
</head>
<body>
    <h1 class="row h4 ml-2"> Exercices PHP - Chapitre 8 - Formulaires </h1>

    <h2 class="row h6 ml-2 my-2">Test des exemples de cours</h2>

    <?php
    echo __FILE__;
    echo'<br>';
    echo $_SERVER["PHP_SELF"];
    ?>

    <p> </p>
    <form action ="<?php print $_SERVER["PHP_SELF"]?>" method="POST">
        Tu utilises internet plutôt le :<br/>
        <input type="checkbox" name="Fjour[]" value="Lundi" />Lundi<br />
        <input type="checkbox" name="Fjour[]" value="Mardi" />Mardi<br />
        <input type="checkbox" name="Fjour[]" value="Mercredi" />Mercredi<br />
        <input type="checkbox" name="Fjour[]" value="Jeudi" />Jeudi<br />
        <input type="checkbox" name="Fjour[]" value="Vendredi" />Vendredi<br />
        <input type="submit" value="ENVOYER" /> 
    </form> 

    <?php 
        if( isset($_POST["Fjour"])){
            echo "Tu surfes sur le web en semaine plutôt le : "; 
            // Lecture du tableau 
            foreach ($_POST["Fjour"] as $jour){ 
                echo $jour.'- ';
            } 
        }else {
        }
    ?>

<!--       Création retour à la liste des exercices -->
    <form class="row px-0 mx-3" method="POST" action="/CDA - Exercices - PHP/index.html">
        <button type="submit" class="col btn btn-primary mt-3">Retour aux exercices</button>
    </form>
    
</body>
</html>