<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>EX 5.1 - Les fonctions </title>
</head>
<body>
    <h1 class="row h4 ml-2"> Exercices PHP - Chapitre 5 - Les fonctions </h1>
    <h2 class="row h6 ml-2 my-2"> Ecrivez une fonction qui calcul la somme des valeurs d'un tableau </h1>
        <?php
           function SumTab($tab){
               $resultat=array_sum($tab);
               return $resultat;
           } 

           $tab = array(4,3,8,2);
           $resultat = SumTab($tab);
           echo '<div class="row m-2">'.$resultat.'</div>';
        ?>  

<!--       Création retour à la liste des exercices -->
    <form class="row px-0 mx-3" method="POST" action="/CDA - Exercices - PHP/index.html">
        <button type="submit" class="col btn btn-primary mt-3">Retour aux exercices</button>
    </form>
    
</body>
</html>