<?php 
    require_once('header.php');

    if (!empty($_POST)){
        if (!filter_var($_REQUEST['Email'], FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        } 
        
        if (empty($_REQUEST['Password'])) {
            $passwordErr = "Please type a password";

        } 
        
        if (!isset($emailErr) && !isset($passwordErr)) {
            $email =  strip_tags($_REQUEST['Email']);
            $password =  strip_tags($_REQUEST['Password']);

            require_once('connexion.php');
    
            //Récupération de tous les utilisateurs
            $RequeteUser = $db-> prepare("SELECT email, password FROM user WHERE email = :email");

            $RequeteUser->bindValue(':email',$email,PDO::PARAM_STR);
            $RequeteUser->execute();
            
            $ListUsers = $RequeteUser->fetchAll(PDO::FETCH_OBJ);
            $RequeteUser->closeCursor();
    
            $passwordDB = $ListUsers[0]->password;

            if (password_verify($password,$passwordDB)){
                //Considéré dorénavant comme logué
                $_SESSION['auth'] = 'OK';
    
               //Redirection vers la page précédente
                 header("Location: index.php");
            }
        }
    }
?>

<body>
    <div class="container">
        
        <h1 class="h1">Login</h1>

        <form action="" method="POST" novalidate>
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="text" placeholder="Enter email adresse" class="form-control <?= isset($emailErr) ? 'is-invalid' : '' ?>" name="Email" value="<?= isset($_REQUEST['Email']) ? $_REQUEST['Email']  : ''?>" required>
                <div class="invalid-feedback">
                <?= isset($emailErr) ? $emailErr : '' ?>
                </div>
            </div>

            <div class="form-group">    
                <label for="Password">Password</label>
                <input type="password" placeholder="Enter your password" class="form-control  <?= isset($passwordErr) ? 'is-invalid' : '' ?>""  name="Password" value="" required>
                <div class="invalid-feedback">
                <?= isset($passwordErr) ? $passwordErr : '' ?>
                </div>
            </div>
            
                <button type="submit" class="btn btn-primary">Ajouter</button>
                <button type="reset" class="btn btn-secondary" onclick="window.location.href = 'index.php'">Retour</button>
        </form>
    </div>

    <script>
    </script>

