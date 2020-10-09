<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>EX 4.2 - Les tableaux </title>
</head>
<body>
    <h1 class="row h4 ml-2 my-2"> Exercices PHP - Chapitre 4 - Les tableaux </h1>
    <h2 class="row h6 ml-2 my-2"> Départements </h1>
        <?php
            /* Initialisation du tableau */
            $departements = array(
                "Hauts-de-france" => array("Aisne", "Nord", "Oise", "Pas-de-Calais", "Somme"),
                "Bretagne" => array("Côtes d'Armor", "Finistère", "Ille-et-Vilaine", "Morbihan"),
                "Grand-Est" => array("Ardennes", "Aube", "Marne", "Haute-Marne", "Meurthe-et-Moselle", "Meuse", "Moselle", "Bas-Rhin", "Haut-Rhin", "Vosges"),
                "Normandie" => array("Calvados", "Eure", "Manche", "Orne", "Seine-Maritime")
            );
        
            echo '<section class="row">';
            
                ksort($departements); // tri par ordre alphabétique sur les clés
                echo '<div class="col-auto">
                    <p><b>Liste des régions (par ordre alphabétique) suivie du nom des départements</b></p>';
                    foreach ($departements as $region => $dept){
                        echo '<b>Région :</b> '.$region.'<br><em>Département : </em><br>';
                        foreach ($dept as $depart){
                            echo $depart.'<br>';
                        }
                        echo '<br>';
                    }
                echo '</div>';           

                ksort($departements); // tri par ordre alphabétique sur les clés
                echo '<div class="col-auto">
                    <p><b>Liste des régions suivie du nombre de départements</b></p>';
                    foreach ($departements as $region => $dept){
                        echo '<b>Région :</b> '.$region.' | Nombre de département : '.count($dept).'<br>';
                    }
                echo '</div>'; 

            echo '</section>';
        ?>  

<!--       Création retour à la liste des exercices -->
    <form class="row px-0 mx-3" method="POST" action="/CDA - Exercices - PHP/index.html">
        <button type="submit" class="col btn btn-primary mt-3">Retour aux exercices</button>
    </form>
    
</body>
</html>