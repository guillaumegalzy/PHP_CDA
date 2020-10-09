<?php 
    echo"<h1>\n\tBonjour le monde\n</h1>\n"; 
    echo"<h2 style='color : red'>\n\ttest";
    echo"\n\t<br>\n\tAffichage d'un \"\n</h2>"; 

    $a = "Winter"; 
    echo $a . " is coming !"; 

    echo"<br>Fichier en cours d'utilisation: ".__FILE__.", <br>ligne de code  : ".__LINE__;
    $test="testdump";
    echo var_dump($test);


    $myVar = "KO";
        if ($myVar == "OK") 
        {   
        echo"C'est bon<br>";
        } 
        else 
        {
            echo"Ouh la la pas bien !<br>"; // Message affiché dans la page web
            $message = "Ouh la la pas bien ".__FILE__." ".__LINE__;        
            error_log($message);         
        } 

    echo "<br>Nom du serveur :" .$_SERVER["SERVER_NAME"]; /* : affiche le nom de l'hôte (= serveur), localhost pour Wamp */
    var_dump($_SERVER); /* affiche toutes les variables du tableau $_SERVER */
  ?>