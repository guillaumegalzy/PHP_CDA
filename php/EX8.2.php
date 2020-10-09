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

    <h2 class="row h6 ml-2 my-2">Element envoyés par le formulaire</h2>

    <?php
    echo '<p>Contenu du champ "Societé" : '.$_REQUEST["societe"]."</p>";
    echo '<p>Contenu du champ "Personne à contacter" : '.$_REQUEST["contactPersonne"]."</p>";
    echo '<p>Contenu du champ "Adresse de l\'entreprise" : '.$_REQUEST["adresseEntreprise"]."</p>";
    echo '<p>Contenu du champ "Code Postal" : '.$_REQUEST["codePostal"]."</p>";
    echo '<p>Contenu du champ "Ville" : '.$_REQUEST["ville"]."</p>";
    echo '<p>Contenu du champ "Email" : '.$_REQUEST["email"]."</p>";
    echo '<p>Contenu du champ "Téléphone" : '.$_REQUEST["telephone"]."</p>";
    echo '<p>Contenu du champ "Environnement du projet" :'.$_REQUEST["environnement"]."</p>";
    ?>

<!--       Création retour à la liste des exercices -->
    <form class="row px-0 mx-3" method="POST" action="/CDA - Exercices - PHP/index.html">
        <button type="submit" class="col btn btn-primary mt-3">Retour aux exercices</button>
    </form>
    
</body>
</html>