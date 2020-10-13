<?php
    require_once('header.php');

    require_once('connexion.php');


    // Requête pour la page en cours
    $SqlDisqueDetails = "SELECT * FROM disc join artist on disc.artist_id = artist.artist_id WHERE disc_id=?"; // écriture requête

    $requeteDiscDetails = $db->prepare($SqlDisqueDetails); // prépare requête
    $requeteDiscDetails->execute(array($_REQUEST['id'])); // exécute requête avec l'id en paramètre
    $tableauDiscDetails = $requeteDiscDetails->fetch(PDO::FETCH_NAMED);
    $requeteDiscDetails->closeCursor();    

?>

<body>
    <div class="container">
        <h1 class="h1">Details</h1>

        <form action="update_form.php" method="GET" class="needs-validation">
            <div class="form-group">
                <label for="Title">Title</label>
                <input type="text" placeholder="Enter title" class="form-control" name="Title" value="<?php echo $tableauDiscDetails['disc_title']?>" readonly>
            </div>

            <div class="form-group">    
                <label for="Artist">Artist</label>
                <input type="text" class="form-control" name="Artist" value="<?php echo $tableauDiscDetails['artist_name']?>" readonly>
            </div>

            <div class="form-group">    
                <label for="Year">Year</label>
                <input type="text" placeholder="Enter year" class="form-control" name="Year" value="<?php echo $tableauDiscDetails['disc_year']?>" readonly>
            </div>

            <div class="form-group">
                <label for="Genre">Genre</label>
                <input type="text" placeholder="Enter genre (Rock,Pop,Prog...)" class="form-control" name="Genre" value="<?php echo $tableauDiscDetails['disc_genre']?>" readonly>
            </div>

            <div class="form-group">
                <label for="Label">Label</label>
                <input type="text" placeholder="Enter label (EMI, Warner, Polygram, Univers sale ...)" class="form-control" name="Label" value="<?php echo $tableauDiscDetails['disc_label']?>" readonly>
            </div>

            <div class="form-group">
                <label for="Price">Price</label>
                <input type="text" placeholder="Price" class="form-control" name="Price" value="<?php echo $tableauDiscDetails['disc_price']?>" readonly>
            </div>

            <div class="form-group text-center">
                <label for="Picture" >Prévisualisation image</label>
                <input hidden name="Picture" value="img\<?php echo $tableauDiscDetails['disc_picture']?>">
                <img src="img\<?php echo $tableauDiscDetails['disc_picture']?>" class="form-control mx-auto" style="height:250px; width:auto; border:none"> 
            </div>

            <input hidden name="id" value="<?php echo $tableauDiscDetails['disc_id']?>">
            <input hidden name="artist_id" value="<?php echo $tableauDiscDetails['artist_id'][0]?>">
                
                <button type="submit" class="btn btn-primary">Modifier</button>
                <button type="button" class="btn btn-danger" onclick="window.location.href = 'delete_script.php?id=<?php echo $_REQUEST['id'] ?>'">Supprimer</button>
                <button type="reset" class="btn btn-secondary" id="BtnReset" onclick="window.location.href = 'index.php'">Retour</button>
        </form>
    </div>
</body>

<?php require_once 'footer.php'?>