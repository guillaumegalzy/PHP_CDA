<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>EX 3.1 - Les boucles </title>
</head>
<body>
    <h1 class="row h4 ml-2"> Exercices PHP - Chapitre 3 - Les boucles </h1>

    <!-- SCRIPT SPECIFIQUE EX 3.1 -->
        <?php
            echo '<h3 class="row h6 mt-4 mx-3">Résultat du script PHP EX3.1 - Affichage texte: <br></h3>';
            echo '<div class="row mx-3 text-justify font-weight-bold">';
        
            for ($i=1; $i <=150; $i++){
                if ($i%2 == 1){ /* si le résultat de la division par deux est non nul alors nombre impair */
                    echo $i." | ";
                }
            }
            echo "</div>";
            echo '  <h3 class="row h6 mt-4 mx-3">
                        Résultat du script PHP EX3.1 - Affichage tableau Bootstrap: 
                    </h3>
                    <div class="row mx-3">
                        <table class="table table-responsive table-striped table-bordered my-2 pl-0">
                            <thead>
                                <tr>
                                    <th class="p-0">Nb occurence</th>';
                                    for ($i=0; $i <=150; $i++){
                                        if ($i%2 == 1){ /* si le résultat de la division par deux est non nul alors nombre impair */
                                            static $compteur = 1; //permet de suivre le nombre d'occurence, evite le reset de la valeur par déclaration en static
                                            echo '<th scope="row">'.$compteur.'</th>';
                                            $compteur ++;
                                        }
                                    }
                        echo'   </tr>
                            <thead>
                            <tbody>
                                <tr>
                                    <td>Impair</td>';
                                    for ($i=0; $i <=150; $i++){
                                        if ($i%2 == 1){ /* si le résultat de la division par deux est non nul alors nombre impair */
                                            static $compteur = 1;
                                            echo '<td>'.$i.'</td>';
                                            $compteur ++;
                                        }
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

</div>
</body>
</html>