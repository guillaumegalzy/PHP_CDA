<?php 
    require_once('header.php');

/*     var_dump($_POST); */
?>

<body>
    <div class="container">
        
        <h1 class="h1">Login</h1>

        <form action="login_script.php" method="POST" class="needs-validation" novalidate>
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="text" placeholder="Enter email adresse" class="form-control" name="Email" value="" required>
                <div class="invalid-feedback">
                    Please enter an email adress.
                </div>
            </div>

            <div class="form-group">    
                <label for="Password">Password</label>
                <input type="password" placeholder="Enter your password" class="form-control" name="Password" value="" required>
                <div class="invalid-feedback">
                    Please enter a password.
                </div>
            </div>
            
            <input type="text" hidden name="PreviousPage" value="<?php echo $_REQUEST['PreviousPage']?>"> <!-- Récupère l'adresse de la page ayant envoyé vers le formulaire -->

                <button type="submit" class="btn btn-primary">Ajouter</button>
                <button type="reset" class="btn btn-secondary" onclick="window.location.href = 'index.php'">Retour</button>
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
            }, false);
        })();
    </script>

