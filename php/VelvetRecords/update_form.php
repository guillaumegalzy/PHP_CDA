<?php
    require_once 'header.php';

    require_once 'connexion.php';

    if (empty($_POST)){  //Si pas de POST détecté champs vide
        $_POST['Title'] = $errorTitle = $errorTitleMsg = "";
        $_POST['Artist'] = $errorArtist = $errorArtistMsg = "";
        $_POST['Year'] = $errorYear = $errorYearMsg = "";
        $_POST['Genre'] = $errorGenre = $errorGenreMsg ="";
        $_POST['Label'] = $errorLabel = $errorLabelMsg ="";
        $_POST['Price'] = $errorPrice = $errorPriceMsg ="";
        $_POST['Picture'] = $errorPicture = $errorPictureMsg = "";

    } else { //Si post détecté lancement de la vérification
        require_once 'verify_form.php';
        
        if (!isset($errorFind)){
            require_once 'update_script.php';
        }
    }
    
    // Requête pour la page en cours.
    $SqlArtist = "SELECT DISTINCT artist_id, artist_name FROM artist ORDER BY 2 ASC"; // écriture requête de tous les artistes présents dans la BDD
    
    $requeteArtist = $db->prepare($SqlArtist); // prépare requête
    $requeteArtist = $db->query($SqlArtist); // exécute requête
    $requeteArtist = $db->query($SqlArtist); // exécute requête
    $tableauArtist = $requeteArtist->fetchAll(PDO::FETCH_OBJ);
    $requeteArtist->closeCursor();

?>
<body>
    <div class="container">
        
        <h1 class="h1">Modification form</h1>
     
        <form action="" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
            <div class="form-group">
                <label for="Title">Title</label>
                <input type="text" placeholder="Enter title" class="form-control <?= $errorTitle?>" name="Title" value="<?= $_REQUEST['Title']?>" required>
                <div class="invalid-feedback">
                    <?= $errorTitleMsg?>
                </div>
            </div>

            <div class="form-group">    
            <label for="Artist">Artist</label>
                <select placeholder="Enter year" class="form-control <?= $errorArtist?>" name="Artist" required>
                <option value="">Select an artist from this list</option>
                    <?php forEach($tableauArtist as $artist)
                        if ($artist->artist_id == $_REQUEST['artist_id']){
                            echo '<option selected="selected" value="'.$artist->artist_id.'">'.$artist->artist_name.'</option>';
                        } else {
                            echo  '<option value="'.$artist->artist_id.'">'.$artist->artist_name.'</option>';
                        }
                    ?>
                </select>
                <div class="invalid-feedback">
                    <?= $errorArtistMsg?>
                </div>
            </div>

            <div class="form-group">    
                <label for="Year">Year</label>
                <input type="text" placeholder="Enter year" class="form-control <?= $errorYear?>" name="Year" maxlength="4" value="<?= $_REQUEST['Year']?>" required>
                <div class="invalid-feedback">
                    <?= $errorYearMsg?>
                </div>
            </div>

            <div class="form-group">
                <label for="Genre">Genre</label>
                <input type="text" placeholder="Enter genre (Rock,Pop,Prog...)" class="form-control <?= $errorGenre?>" name="Genre" value="<?= $_REQUEST['Genre']?>" required>
                <div class="invalid-feedback">
                    <?= $errorGenreMsg?>
                </div>
            </div>

            <div class="form-group">
                <label for="Label">Label</label>
                <input type="text" placeholder="Enter label (EMI, Warner, Polygram, Univers sale ...)" class="form-control <?= $errorLabel?>" name="Label" value="<?= $_REQUEST['Label']?>" required>
                <div class="invalid-feedback">
                    <?= $errorLabelMsg?>
                </div>
            </div>

            <div class="form-group">
                <label for="Price">Price</label>
                <input type="text" placeholder="Price" class="form-control <?= $errorPrice?>" name="Price" value="<?= $_REQUEST['Price']?>" required>
                <div class="invalid-feedback">
                    <?= $errorPriceMsg?>
                </div>
            </div>

            <div class="form-group mb-0">
                <label for="Picture">Picture</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input <?= $errorPicture?>" name="Picture" accept="image/*" id="pro_fichier_Image">
                    <label class="custom-file-label">Choose file</label>
                    <div class="invalid-feedback">
                        <?= $errorPictureMsg?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <figcaption class="text-center">Image actuelle</figcaption>
                        <img src="<?= $_REQUEST['Picture']?>" class="form-control mx-auto " style="height:250px; width:auto; border:none" > 
                    </div>
                    <div class="previewImg col-6">
                        <figcaption class="text-center">Prévisualisation image</figcaption>
                        <img src="" class="form-control mx-auto" style="height:250px; width:auto; border:none" id="previewImg"> 
                    </div>
                </div>
            </div>

            <input hidden name="id" value="<?= $_REQUEST['id']?>">

                <button type="submit" class="btn btn-primary">Modifier</button>
                <button type="reset" class="btn btn-secondary" id="BtnReset" onclick="window.location.href = 'index.php'">Retour</button>
        </form>
    </div>

    <script>
        (function() {
        'use strict';
            window.addEventListener("load", function() {

            // Récuperation de la div comportant l'upload de fichier
            const photoImg = document.getElementById("pro_fichier_Image");

            // Récuperation de la div comportant la prévisualisation de l'image
            const preview = document.getElementById("previewImg");

            //Gestionnaire d'écoute pour changement du fichier uploadé
            photoImg.addEventListener("change",function () {

                // Récupération des informations du 1er fichier soumis par l'utilisateur    
                const file = document.querySelector('input[type=file]').files[0];

                // Construction d'un objet FileReader pour exploitation ultérieure des informations de l'image soumise
                const reader = new FileReader();

                // Création gestionnaire d'écoute sur le lecteur, à son chargement, 
                reader.addEventListener("load", function () {
                    preview.src = reader.result; // remplit le src de l'img de prévisualisation par une chaîne encodée en base 64 en utilisant la méthode .result utilisable sur des objets de type Filereader 
                    }, false);

                    if (file) {reader.readAsDataURL(file);} // lancement de la fonction de lecture du fichier 'readAsDataURL' seulement si une image a été choisit
                
            });
        }, false);

    })();
    </script>
</body>

<?php require_once 'footer.php'?>