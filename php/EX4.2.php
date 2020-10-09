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
    <h2 class="row h6 ml-2 my-2"> Capitales </h1>
        <?php
            /* Initialisation du tableau */
            $capitales = array(
                "Bucarest" => "Roumanie",
                "Bruxelles" => "Belgique",
                "Oslo" => "Norvège",
                "Ottawa" => "Canada",
                "Paris" => "France",
                "Port-au-Prince" => "Haïti",
                "Port-d'Espagne" => "Trinité-et-Tobago",
                "Prague" => "République tchèque",
                "Rabat" => "Maroc",
                "Riga" => "Lettonie",
                "Rome" => "Italie",
                "San José" => "Costa Rica",
                "Santiago" => "Chili",
                "Sofia" => "Bulgarie",
                "Alger" => "Algérie",
                "Amsterdam" => "Pays-Bas",
                "Andorre-la-Vieille" => "Andorre",
                "Asuncion" => "Paraguay",
                "Athènes" => "Grèce",
                "Bagdad" => "Irak",
                "Bamako" => "Mali",
                "Berlin" => "Allemagne",
                "Bogota" => "Colombie",
                "Brasilia" => "Brésil",
                "Bratislava" => "Slovaquie",
                "Varsovie" => "Pologne",
                "Budapest" => "Hongrie",
                "Le Caire" => "Egypte",
                "Canberra" => "Australie",
                "Caracas" => "Venezuela",
                "Jakarta" => "Indonésie",
                "Kiev" => "Ukraine",
                "Kigali" => "Rwanda",
                "Kingston" => "Jamaïque",
                "Lima" => "Pérou",
                "Londres" => "Royaume-Uni",
                "Madrid" => "Espagne",
                "Malé" => "Maldives",
                "Mexico" => "Mexique",
                "Minsk" => "Biélorussie",
                "Moscou" => "Russie",
                "Nairobi" => "Kenya",
                "New Delhi" => "Inde",
                "Stockholm" => "Suède",
                "Téhéran" => "Iran",
                "Tokyo" => "Japon",
                "Tunis" => "Tunisie",
                "Copenhague" => "Danemark",
                "Dakar" => "Sénégal",
                "Damas" => "Syrie",
                "Dublin" => "Irlande",
                "Erevan" => "Arménie",
                "La Havane" => "Cuba",
                "Helsinki" => "Finlande",
                "Islamabad" => "Pakistan",
                "Vienne" => "Autriche",
                "Vilnius" => "Lituanie",
                "Zagreb" => "Croatie"
            );
        ksort($capitales); // tri par ordre alphabétique sur les clés
        echo '<section class="row">';
            echo '<div class="col-auto">
                <p><b>Liste des capitales (par ordre alphabétique) suivie du nom du pays</b></p>';
                foreach ($capitales as $keys => $values){
                    echo 'Capitale : '.$keys.' | Pays : '.$values.'<br>';
                }
            echo '</div>';           

            asort($capitales); // tri par ordre alphabétique sur les clés
            echo '<div class="col-auto">
                <p><b>Liste des pays (par ordre alphabétique) suivie du nom de la capitale.</b></p>';
                foreach ($capitales as $keys => $values){
                    echo 'Pays : '.$values.' | Capitale : '.$keys.'<br>';
                }
            echo '</div>'; 

            echo '<div class="col-auto">
                <p><b>Nombre de pays dans le tableau</b></p>';
                count($capitales);
                echo count($capitales).' pays dans le tableau';
            echo '</div>'; 

            echo '<div class="col-auto">
                <p><b>Tableau avec suppression pays commençant par B</b></p>';
                foreach ($capitales as $keys => $values){
                    if(preg_match('/^B.*$/',$values) == 1){
                        unset($capitales[$keys]); //supprime les clés et valeurs associées du tableau
                    }else {
                        echo 'Pays : '.$values.' | Capitale : '.$keys.'<br>';
                    }
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