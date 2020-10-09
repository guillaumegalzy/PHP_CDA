<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>EX 4.0 - Les tableaux </title>
</head>
<body>
    <h1 class="row h4 ml-2 my-2"> Exercices PHP - Chapitre 4 - Les tableaux </h1>
    <h2 class="row h5 ml-2 my-2"> Mois de l'année non bissextile </h1>
    
    <div class=" ml-3">
        <?php
            /* Initialisation du tableau */
            $tab = array ('Janvier'=> 31,
            'Février'=> 28,
            'Mars'=> 31,
            'Avril'=> 30,
            'Mai'=> 31,
            'Juin'=> 30,
            'Juillet'=> 31,
            'Août'=> 31,
            'Septembre'=> 30,
            'Octobre'=> 31,
            'Novembre'=> 30,
            'Décembre'=> 31);
            
            echo'<div class="row">';
                echo'<div class="text-center m-3">';
                    echo '<p><b>Tableau non trié :</b></p>';         
                    echo '<table class="table table-responsive table-hover table-bordered table-striped p-0">
                                <thead>
                                    <tr>
                                        <th>Mois</th>
                                        <th>Nombre de jours</th>
                                    </tr>
                                </thead>';  /* Fermeture de l'en-tête */
                    echo' 
                            <tbody>'; /* Ouverture du corps du tableau pour édition */
                    foreach ($tab as $key => $value){
                            echo '
                                <tr>
                                    <th>'.$key.'</th>
                                    <td>'.$value.'</td>
                                </tr>';
                    }
                    echo '
                            </tbody>
                        </table>
                </div>';
                
                echo'<div class="text-center m-3">';
                    echo '<p><b>Tableau trié :</b></p>';         
                    echo '<table class="table table-responsive table-hover table-bordered table-striped p-0">
                                <thead>
                                    <tr>
                                        <th>Mois</th>
                                        <th>Nombre de jours</th>
                                    </tr>
                                </thead>';  /* Fermeture de l'en-tête */
                    echo' 
                            <tbody>'; /* Ouverture du corps du tableau pour édition */
                asort($tab);
                foreach ($tab as $key => $value){
                            echo '
                                <tr>
                                    <th>'.$key.'</th>
                                    <td>'.$value.'</td>
                                </tr>';
                    }
                    echo '
                            </tbody>
                        </table>
                </div>
            </div>';
                             
            ?> 
    </div>
<!--       Création retour à la liste des exercices -->
    <form class="row px-0 mx-3" method="POST" action="/CDA - Exercices - PHP/index.html">
        <button type="submit" class="col btn btn-primary mt-3">Retour aux exercices</button>
    </form>
    
</body>
</html>