<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>EX 7 - Les fichiers </title>
</head>
<body>
    <h1 class="row h4 ml-2"> Exercices PHP - Chapitre 7 - La manipulation des fichiers </h1>

    <h2 class="row h6 ml-2 my-2">Lecture de fichier</h2>
    <?php
        $liste = file('liens.txt'); //Lecture des informations compris dans le fichier texte et injection dans un tableau
        echo'<p class="m-2">';
        foreach ($liste as $lien){
            static $compteur=1;
            echo '<a href="'.$lien.'">Lien n°'.$compteur.' - '.$lien.'</a><br>'; 
            $compteur++;
        }
        echo'</p>';
    ?>  

    <h2 class="row h6 ml-2 my-3">Récupération d'un fichier distant</h2>
    <?php
       $csv = file('http://bienvu.net/misc/customers.csv');
       //var_dump($csv);
       $newcsv = [];
       foreach($csv as $element){
            array_push($newcsv,explode(',',$element));
       }
       //var_dump($newcsv);
    ?>  
    <div class="col-8 mx-auto">
        <table class="table table-hover table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Surname</th>
                    <th>Firstname</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>City</th>
                    <th>State</th>
                </tr>
            </thead>  <!-- Fermeture de l'en-tête -->
            <tbody>
                <?php
                    foreach($newcsv as $keys=>$line){
                        echo '<tr>
                                <th>'.$keys.'</th>'; //On parcourt chaque entrée

                        foreach($line as $values){
                            echo'<th>'.$values.'</th>'; //On parcourt chaque données de chaque entrée
                        }
                    }
                ?>  
            </tbody>
        </table>
    </div>

<!--       Création retour à la liste des exercices -->
    <form class="row px-0 mx-3" method="POST" action="/CDA - Exercices - PHP/index.html">
        <button type="submit" class="col btn btn-primary mt-3">Retour aux exercices</button>
    </form>
    
</body>
</html>