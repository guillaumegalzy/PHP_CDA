<?php
    echo var_dump($_SERVER);
    echo "Adresse IP du serveur : <b>". $_SERVER['SERVER_ADDR']."</b>";
    echo "<br> Adresse IP du client : <b>".$_SERVER['REMOTE_ADDR']."<b>"
    ?>