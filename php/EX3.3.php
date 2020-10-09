<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>EX 3.3 - Les boucles </title>
</head>
<body>
    <h1 class="row h4 ml-2"> Exercices PHP - Chapitre 3 - Les boucles </h1>

    <!-- SCRIPT SPECIFIQUE EX 3.3 -->
        <?php
            echo '<h3 class="row h6 mt-4 mx-3">Résultat du script PHP EX3.3 - Affichage tableau Bootstrap</h3>';
            echo'
                <div class="row text-center justify-content-center">
                    <table class="col-6 table table-responsive table-hover table-bordered table-striped p-0 m-0">
                        <thead class="col-12">
                            <tr>
                                <th></th>'; //premiere colonne vide
                                for ($i=0; $i <=12; $i++){ // boucle de création de toutes les colonnes d'en
                                        echo '<th>'.$i.'</th>';
                                }
                    echo'   </tr>
                        </thead>';  /* Fermeture de l'en-tête */

                    echo' <tbody>'; /* Ouverture du corps du tableau pour édition */
                            for ($y=0; $y <=12; $y++){ /* première boucle pour création des noms de lignes */
                                echo '<tr>
                                            <th>'.$y.'</th>';
                                    static $multiplicateur = 0; // Initialisation du facteur multiplicateur en static pour éviter réinitialisation à chaque itération
                                    for ($u=0; $u <=12; $u++){  /* Deuxième boucle pour édition et calcul de chacune des cellules du tableau */
                                        echo '<td>'.($u*$multiplicateur).'</td>';
                                }
                                $multiplicateur++; /* Incrémation du facteur multiplicateur */
                            }
                        echo '</tr>';
                        echo '</tbody>
                    </table>
                </div>';

                ?>

<!--       Création retour à la liste des exercices -->
    <form class="row px-0 mx-3" method="POST" action="/CDA - Exercices - PHP/index.html">
        <button type="submit" class="col btn btn-primary mt-3">Retour aux exercices</button>
    </form>
    
</body>
</html>