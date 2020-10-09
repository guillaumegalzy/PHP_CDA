<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>EX 3.2 - Les boucles </title>
</head>
<body>
    <h1 class="row h4 ml-2"> Exercices PHP - Chapitre 3 - Les boucles </h1>

    <!-- SCRIPT SPECIFIQUE EX 3.2 -->
        <?php
            echo '<h3 class="row h6 mt-4 mx-3">Résultat du script PHP EX3.2</h3>';
        
            do{
                static $compteur = 0;
                echo '<p class= "row ml-3 py-0 my-0">' .($compteur+1).' - Je dois faire des sauvegardes régulières de mes fichiers.</p>';
                $compteur ++;
            } while ($compteur < 500);

            ?>

<!--       Création retour à la liste des exercices -->
    <form class="row px-0 mx-3" method="POST" action="/CDA - Exercices - PHP/index.html">
        <button type="submit" class="col btn btn-primary mt-3">Retour aux exercices</button>
    </form>

</body>
</html>