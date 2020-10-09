<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>EX 7 - Les fichiers </title>
</head>
<body>
    <h1 class="row h4 ml-2"> Exercices PHP - Chapitre 8 - Formulaires </h1>

    <h2 class="row h6 ml-2 my-2">Lecture de fichier</h2>
    <?php
        echo "Tu surfes sur le web en semaine plutôt le : "; 
        // Lecture du tableau 
        foreach ($_POST["Fjour"] as $jour){ 
            echo $jour.'- ';
        } 
    ?>


<!--       Création retour à la liste des exercices -->
    <form class="row px-0 mx-3" method="POST" action="/CDA - Exercices - PHP/index.html">
        <button type="submit" class="col btn btn-primary mt-3">Retour aux exercices</button>
    </form>
    
</body>
</html>