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

    <h2 class="row h6 ml-2 my-2">Exemples cours</h2>
    <?php
         // On déclare une variable dont la valeur (contenu) sera écrite dans le fichier
           // $myVar = "www.test.fr\n";

            // Ouverture en écriture seule 
            //$fp = fopen("liens.txt", "a"); 
            
            // Ecriture du contenu ($myVar) 
            //fputs($fp, $myVar); 
            
            // Fermeture du fichier  
            //fclose($fp); 
    ?>  

    <!-- //!Compteurs nombre de visiteurs distinct sur deux pages via Fopen-->
    <?php
        echo '<p class="m-2"><b>Lecture via fopen</b><br>';
        $fp = fopen("Compteurs.txt",'r+'); //Ouverture du fichier Compteurs.txt
        $visiteursA = substr(fgets($fp),0,strlen(fgets($fp)-2)); //Lecture de la 1ère ligne du fichier Compteurs.txt et affectation à $visiteursA
                var_dump($visiteursA);
                $visiteursA+=5;
                var_dump($visiteursA);
        
        //fseek($fp,5); //Déplacement du pointer au 0ème caractère du fichier
        
        $visiteursB = fgets($fp); // Déplacement du handle sur la ligne suivante et lecture de la 2ème ligne du fichier Compteurs.txt et affectation à $visiteursA
                var_dump($visiteursB);
                $visiteursB+=5;
                var_dump($visiteursB);
        echo $visiteursB.'</p>';
        fclose($fp);
    ?>  

    <!-- //!Compteurs nombre de visiteurs distinct sur deux pages VIA SplFileObject -->
    <?php
        echo '<p class="m-2"><b>Lecture via SplFileObject</b><br>';
        $fp = new SplFileObject('Compteurs.txt'); //Ouverture du fichier Compteurs.txt
        echo '/ Position du pointeur - Etat initial : '.$fp->ftell().'/ <br>';
        $visiteursA = $fp->current(); //Lecture de la ligne du fichier Compteurs.txt sur laquelle se trouve le pointeur et affectation à $visiteursA
        echo 'Valeur lue, 1ère ligne => '.$visiteursA.'<br>'.'/ Position du pointeur - Apres lecture 1ere ligne => '.$fp->ftell().' /<br>'; //Lecture de la position du pointeur
        $visiteursB = $fp->fgets(); // Déplacement du handle sur la ligne suivante et lecture de la 2ème ligne du fichier Compteurs.txt et affectation à $visiteursA
        echo 'Valeur lue, 2ème ligne => '.$visiteursB.'<br>';
        echo '/ Position du pointeur - Apres lecture 2ème ligne =>'.$fp->ftell().' / </p>'; //Lecture de la position du pointeur
    ?>  

    <!-- //!Compteurs nombre de visiteurs distinct sur l'ensemble des pages avec Foreach VIA SplFileObject -->
    <?php
        echo '<p class="m-2"><b>Lecture via SplFileObject avec boucle foreach</b><br>';
        $file = new SplFileObject('Compteurs.txt');
        $reading = [];
        foreach ($file as $line) {
            echo ($file->key() + 1) . '. ' . $file->current().'<br>';
        }
        echo'</p>';
    ?>

<!--       Création retour à la liste des exercices -->
    <form class="row px-0 mx-3" method="POST" action="/CDA - Exercices - PHP/index.html">
        <button type="submit" class="col btn btn-primary mt-3">Retour aux exercices</button>
    </form>
    
</body>
</html>