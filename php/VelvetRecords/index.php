<?php
    require_once('header.php');

    require_once('connexion.php');

    // Requête pour la page en cours
    $SqlArtist = "SELECT artist_name FROM artist where artist_id=?"; // écriture requête

    $SqlDisque = "SELECT * FROM disc ORDER BY disc_title ASC"; // écriture requête
    $requeteDisc = $db->prepare($SqlDisque); // prépare requête
    $requeteDisc = $db->query($SqlDisque); // exécute requête
    $tableauDisc = $requeteDisc->fetchAll(PDO::FETCH_OBJ);
    $requeteDisc->closeCursor();
?>

<body>
    <div class="container">
        <div class="row justify-content-between m-2 pt-2">
            <h1 class="h1">Liste des disques 
                (<?php echo count($tableauDisc)?>) <!-- Récupère et affiche le nombre de disques dans la BDD -->
            </h1>
            <form action="add_form.php" method="GET" <?= $ShowWhenLogged?>>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>

        <div class="row">
            <?php foreach ($tableauDisc as $disc): ?>
                <div class="col-6 col-lg-3 mt-3">
                    <img src="img/<?= $disc->disc_picture ?>" alt="<?= $disc->disc_title ?>" class="img-fluid p2">
                </div>
                <div class="col-6 col-lg-3 d-flex flex-column justify-content-between mt-3">
                    <div>
                        <p class="h4"><?= $disc->disc_title ?></p>
                        <p><b>Artist</b> : 
                        <?php
                            $requeteArtist = $db->prepare($SqlArtist); 
                            $requeteArtist->execute(array($disc->artist_id)); //Récupère le nom de l'artiste pour l'id du titre cible
                            $Artist = $requeteArtist->fetch(PDO::FETCH_OBJ); //Récupère le nom de l'artiste pour l'id du titre cible
                            echo $Artist->artist_name;  //Affiche le nom de l'artiste pour l'id du titre cible
                        ?>
                        </p>
                        <p><b>Label</b> : <?= $disc->disc_label ?></p>
                        <p><b>Year</b> : <?= $disc->disc_year ?></p>
                        <p><b>Genre</b> : <?= $disc->disc_genre ?></p>
                    </div>
                    <div class="mb-2">
                        <button type="button" class="btn btn-primary" onclick="window.location.href = 'details.php?id=<?= $disc->disc_id ?>'">Details</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>  
    </div>
</body>

<?php require_once 'footer.php'?>