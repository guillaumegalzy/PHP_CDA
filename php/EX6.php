<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>EX 6 - Les dates et les heures </title>
</head>
<body>
    <h1 class="row h4 ml-2"> Exercices PHP - Chapitre 6 - Les dates et les heures </h1>

    <h2 class="row h6 ml-2 my-2">Trouvez le numéro de semaine de la date suivante : 14/07/2019.</h2>
    <?php
        echo '<div class="m-2 mb-4">';
            $date = '2019/07/14'; //Le format le plus sûr étant encore le format "année-mois-jour heure:minutes:secondes". Le format Français "jour/mois/année heure:minutes:secondes" n'est quant à lui pas supporté.
            $dateTime = new DateTime($date);
            echo 'Le numéro de semaine du '.$dateTime->format('d/m/Y').' est : '.($dateTime->format("W"));
        echo '</div>';
    ?>  

    <h2 class="row h6 ml-2 my-2">Combien reste-t-il de jours avant la fin de votre formation.</h2>
    <?php
        echo '<div class="m-2 mb-4">';
            $dateTimeJour = new DateTime();
            $dateFin = '16/04/2021';
            $dateTimeFin = DateTime::createFromFormat('d/m/Y',$dateFin);
            $interval = date_diff($dateTimeFin,$dateTimeJour); //Différence entre les deux date crée un objet DateInterval
            $joursRestant = $interval->days ; //Récupération de l'attribut "days" de l'objet DateInterval
        echo 'Le nombre de jours de formation restant est : '.$joursRestant.' jour(s)';
        echo '</div>';
    ?>  

    <h2 class="row h6 ml-2 my-2">Comment déterminer si une année est bissextile ?</h2>
    <?php
        echo '<div class="m-2 mb-4">';
            //$dateTimeJour = new DateTime(); // Création objet DateTime à partir de maintenant (now())
            //$anneeTest = $dateTimeJour->format('Y'); // Récupération de l'année en cours
            $anneeTest = 1982;
            $test = $anneeTest . '/02/29'; // Création string pour tester l'existence du 29 février pour l'année en cours
            $dateTimeTest = new DateTime($test); // Création nouvelle DateTime correspondant au 29 février de l'année en cours
            $errors = DateTime::getLastErrors(); // Récupération des erreurs potentielles lors de la généaration du nouvel objet DateTime
            if (count($errors['warnings']) != 0){
                echo "L'année ".$anneeTest." n'est pas une année bissextile."; // Si erreur détectée alors année bissextile
            } else {
                echo "L'année ".$anneeTest." est une année bissextile.";
            }
         echo '</div>';
    ?>  

    <h2 class="row h6 ml-2 my-2">Montrez que la date du 32/17/2019 est erronée.</h2>
    <?php
        $dateTest = '32/17/2019';
        $date = DateTime::createFromFormat('d/m/Y',$dateTest);
        $errors =DateTime::getLastErrors();
        $warnings = $errors['warnings'];
        echo '<p class="mx-2">Nombre d\'avertissement(s) recontré(s) : '.count($warnings);
        foreach ($warnings as $warning){
            echo ' => <b>"'.$warning.'"</b></p>';
        }
    ?>  

    <h2 class="row h6 ml-2 my-2">Affichez l'heure courante sous cette forme : 11h25.</h2>
    <?php
        $date = new DateTime('now',new \DateTimeZone('GMT+2')); // Changement de la timeZone pour correspondre à l'heure locale
        echo '<p class="mx-2"> Heure courante : '.$date->format('H\hi').'</p>';
    ?>  

    <h2 class="row h6 ml-2 my-2">Ajoutez 1 mois à la date courante.</h2>
    <?php
        $date = new DateTime('now'); // Changement de la timeZone pour correspondre à l'heure locale
        $dateCurrentA = $date->format('d/m/Y');
        $dateCurrentB = $date->format('l d F Y');
        echo '<p class="mx-2"> Date courante : '.$dateCurrentA.' | '.$dateCurrentB.'</p>';
        $date->add(new DateInterval('P1M')); // 'P' pour période puis '1M' pour ajout d'un mois
        $dateNextA = $date->format('d/m/Y');
        $dateNextB = $date->format('l d F Y');
        echo '<p class="mx-2"> Date courante + 1 mois : '.$dateNextA.' | '.$dateNextB.'</p>';
    ?>    

    <h2 class="row h6 ml-2 my-2">Que s'est-il passé le 1000200000</h2>    
    <?php
        $date = new DateTime();
        $date->setTimestamp(1000200000); //utilisation de setTimestamp permettant la définition d'une date et d'une heure à partir d'un timestamp
        $date = $date->format('d/m/Y');
        echo '<p class="mx-2">Le '.$date.' ont eu lieu les quatres attentats sur le World Trade Center et le Pentagone.</p>';
    ?>  

<!--       Création retour à la liste des exercices -->
    <form class="row px-0 mx-3" method="POST" action="/CDA - Exercices - PHP/index.html">
        <button type="submit" class="col btn btn-primary mt-3">Retour aux exercices</button>
    </form>
    
</body>
</html>