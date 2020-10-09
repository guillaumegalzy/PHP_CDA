<?php
    require_once 'header.php';

    require_once 'connexion.php';

    //Gestion affichage des erreurs détectés lors de la validation côté serveur
        if(isset($_SESSION['errorsForm'])){
            $errorTitle = $_SESSION['errorsForm']['Title'];
            $errorYear = $_SESSION['errorsForm']['Year'];
            $errorGenre = $_SESSION['errorsForm']['Genre'];
            $errorLabel = $_SESSION['errorsForm']['Label'];
            $errorPrice = $_SESSION['errorsForm']['Price'];
            $errorArtist = $_SESSION['errorsForm']['Artist'];
            unset($_SESSION['errorsForm']); // Supprime les erreurs pour éviter l'apparition de nouveau des messages si retour sur le formulaire via un autre chemin
        } else{
            $errorTitle = "";
            $errorYear = "";
            $errorGenre = "";
            $errorLabel = "";
            $errorPrice = "";
            $errorArtist = "";
        }

        if(isset($_SESSION['infos'])){
            $_GET = $_SESSION['infos'];
            if(empty($_SESSION['infos']['Picture']['name'])){ // Si pas d'imager chargée lors de la modification
                $_GET['Picture'] = $_SESSION['infos']['pictureUnchanged'];
            } else {
                $_GET['Picture'] = "img/".$_SESSION['infos']['Picture']['name'];
            }
            $_GET['artist_id'] = $_SESSION['infos']['Artist'];
            unset($_SESSION['infos']); // Supprime les infos pour éviter l'apparition de nouveau des messages si retour sur le formulaire via un autre chemin
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
     
        <form action="update_script.php" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
            <div class="form-group">
                <label for="Title">Title</label>
                <input type="text" placeholder="Enter title" class="form-control <?php echo $errorTitle?>" name="Title" value="<?php echo $_GET['Title']?>" required>
                <div class="invalid-feedback">
                    Please enter a title.
                </div>
            </div>

            <div class="form-group">    
            <label for="Artist">Artist</label>
                <select placeholder="Enter year" class="form-control <?php echo $errorArtist?>" name="Artist" required>
                <option value="">Select an artist from this list</option>
                    <?php forEach($tableauArtist as $artist)
                        if ($artist->artist_id == $_GET['artist_id']){
                            echo '<option selected="selected" value="'.$artist->artist_id.'">'.$artist->artist_name.'</option>';
                        } else {
                            echo  '<option value="'.$artist->artist_id.'">'.$artist->artist_name.'</option>';
                        }
                    ?>
                </select>
                <div class="invalid-feedback">
                    Please select an artist from the list above.
                </div>
            </div>

            <div class="form-group">    
                <label for="Year">Year</label>
                <input type="text" placeholder="Enter year" class="form-control <?php echo $errorYear?>" name="Year" maxlength="4" value="<?php echo $_GET['Year']?>" required>
                <div class="invalid-feedback">
                    Please enter a year.
                </div>
            </div>

            <div class="form-group">
                <label for="Genre">Genre</label>
                <input type="text" placeholder="Enter genre (Rock,Pop,Prog...)" class="form-control <?php echo $errorGenre?>" name="Genre" value="<?php echo $_GET['Genre']?>" required>
                <div class="invalid-feedback">
                    Please enter a genre.
                </div>
            </div>

            <div class="form-group">
                <label for="Label">Label</label>
                <input type="text" placeholder="Enter label (EMI, Warner, Polygram, Univers sale ...)" class="form-control <?php echo $errorLabel?>" name="Label" value="<?php echo $_GET['Label']?>" required>
                <div class="invalid-feedback">
                    Please enter a label.
                </div>
            </div>

            <div class="form-group">
                <label for="Price">Price</label>
                <input type="text" placeholder="Price" class="form-control <?php echo $errorPrice?>" name="Price" value="<?php echo $_GET['Price']?>" required>
                <div class="invalid-feedback">
                    Please enter a price => format {6,2}.
                </div>
            </div>

            <div class="form-group mb-0">
                <label for="Picture">Picture</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="Picture" accept="image/*" id="pro_fichier_Image">
                    <label class="custom-file-label">Choose file</label>
                    <div class="valid-feedback">
                        Picture saved.
                    </div>
                    <div class="invalid-feedback">
                        Please select a picture.
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <figcaption class="text-center">Image actuelle</figcaption>
                        <img src="<?php echo $_GET['Picture']?>" class="form-control mx-auto" style="height:250px; width:auto; border:none" > 
                    </div>
                    <div class="previewImg col-6">
                        <figcaption class="text-center">Prévisualisation image</figcaption>
                        <img src="" class="form-control mx-auto" style="height:250px; width:auto; border:none" id="previewImg"> 
                    </div>
                </div>
            </div>

            <input hidden name="id" value="<?php echo $_GET['id']?>">
            <input hidden name="pictureUnchanged" value="<?php echo $_GET['Picture']?>">

                <button type="submit" class="btn btn-primary">Modifier</button>
                <button type="reset" class="btn btn-secondary" id="BtnReset" onclick="window.location.href = 'index.php'">Retour</button>
        </form>
    </div>

    <!-- Script validation auto JS par Bootstrap -->
    <script>
        (function() {
        'use strict';
            window.addEventListener('load', function() {

                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                        
                    }, false);
                });

                //Gestionnaire d'écoute pour changement du fichier uploadé
                var photoImg = document.getElementById("pro_fichier_Image");
                photoImg.addEventListener("change",PreviewImg);
            }, false);
        })();

        //Prévisualisation des images avant upload
        function PreviewImg(){
            // Récuperation de la div comportant la prévisualisation de l'image
            const preview = document.getElementById("previewImg");

            // Récupération des informations du 1er fichier soumis par l'utilisateur    
            const file = document.querySelector('input[type=file]').files[0];

            // Construction d'un objet FileReader pour exploitation ultérieure des informations de l'image soumise
            const reader = new FileReader();

            // Création gestionnaire d'écoute sur le lecteur, à son chargement, 
            reader.addEventListener("load", function () {
                preview.src = reader.result; // remplit le src de l'img de prévisualisation par une chaîne encodée en base 64 en utilisant la méthode .result utilisable sur des objets de type Filereader 
                }, false);

            if (file) {reader.readAsDataURL(file);} // lancement de la fonction de lecture du fichier 'readAsDataURL' seulement si une image a été choisit
        }
    </script>
</body>

<?php require_once 'footer.php'?>