<?php require_once('header.php');


if (!empty($_POST)){
    $errors= [];
        require_once('connexion.php'); //Récupère tous les emails des users de la DB
        $RequeteAllUser = $db-> prepare("SELECT email FROM user");
        $RequeteAllUser->bindValue(':email',$_POST['Email'],PDO::PARAM_STR);
        $RequeteAllUser->execute();
        $AllUserMail = $RequeteAllUser->fetchAll(PDO::FETCH_OBJ);

        if (!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
            $errors['emailErr'] = "Invalid email format";
        }
        
        foreach($AllUserMail as $userMail){ // Si email déjà présent dans DB
            if($userMail->email == $_POST['Email'] ) {
                $errors['emailErr'] = "Email already exist in DB";
                break;
            }
        }
            
        if (empty($_POST['Password'])) {
            $errors['passwordErr'] = "Please type a password";

        } else if (empty($_POST['PasswordConfirm'])) {
            $errors['passwordConfirmErr']= "Please confirm your password";

        } else if ($_POST['Password'] != $_POST['PasswordConfirm']){
            $errors['passwordConfirmErr'] = "Passwords doesn't match!";
        }

        if (empty($_POST['Fistname'])){
            $errors['firstnameErr'] = "Invalid fistname format";
        }

        if (empty($_POST['Lastname'])){
            $errors['lastnameErr'] = "Invalid lastname format";
        }
        
        if (count($errors) === 0) {
            $email =  strip_tags($_POST['Email']);
            $password =  password_hash($_POST['Password'], PASSWORD_DEFAULT);
            $firstname =  strip_tags($_POST['Fistname']);
            $lastname =  strip_tags($_POST['Lastname']);

            require_once('connexion.php');

            //Ajout de l'utilisateur
            $RequeteAddUser = $db-> prepare("INSERT INTO user (firstname,lastname,email,password) VALUES (:firstname,:lastname,:email,:password)");

            $RequeteAddUser->bindValue(':firstname',$firstname,PDO::PARAM_STR);
            $RequeteAddUser->bindValue(':lastname',$lastname,PDO::PARAM_STR);
            $RequeteAddUser->bindValue(':email',$email,PDO::PARAM_STR);
            $RequeteAddUser->bindValue(':password',$password,PDO::PARAM_STR);
            $RequeteAddUser->execute(); 

            //Redirection vers la page précédente
            header("Location: index.php");
        };
    };
?>

<body>
    <div class="container">
        
        <h1 class="h1">Sign In</h1>

        <form action="" method="POST" class="needs-validation" novalidate>
            <div class="form-group">
                <label for="Title">Email</label>
                <input type="text" placeholder="Enter email adresse" class="form-control <?= isset($errors['emailErr']) ? 'is-invalid' : ''?>" name="Email" value="<?= isset($_POST['Email']) ? $_POST['Email'] : ''?>" required>
                <div class="invalid-feedback">
                    <?= isset($errors['emailErr']) ? $errors['emailErr'] : ''?>
                </div>
            </div>

            <div class="form-group">
                <label for="Fistname">Fistname</label>
                <input type="text" placeholder="Enter your firstname" class="form-control <?= isset($errors['firstnameErr']) ? 'is-invalid' : ''?>" name="Fistname" value="<?= isset($_POST['Fistname']) ? $_POST['Fistname'] : ''?>" required>
                <div class="invalid-feedback">
                    <?= isset($errors['firstnameErr']) ? $errors['firstnameErr'] : ''?>
                </div>
            </div>

            <div class="form-group">
                <label for="Lastname">Lastname</label>
                <input type="text" placeholder="Enter your lastname" class="form-control <?= isset($errors['lastnameErr']) ? 'is-invalid' : ''?>" name="Lastname" value="<?= isset($_POST['Lastname']) ? $_POST['Lastname'] : ''?>" required>
                <div class="invalid-feedback">
                    <?= isset($errors['lastnameErr']) ? $errors['lastnameErr'] : ''?>
                </div>
            </div>

            <div class="form-group">    
                <label for="Password">Password</label>
                <input type="password" placeholder="Enter your password" class="form-control <?= isset($errors['passwordErr']) ? 'is-invalid' : ''?>" name="Password" value="<?= isset($_POST['Password']) ? $_POST['Password'] : ''?>" required>
                <div class="invalid-feedback">
                    <?= isset($errors['passwordErr']) ? $errors['passwordErr'] : ''?>
                </div>
            </div>

            <div class="form-group">    
                <label for="PasswordConfirm">Password Confirmation</label>
                <input type="password" placeholder="Enter your password" class="form-control <?= isset($errors['passwordConfirmErr']) ? 'is-invalid' : ''?>" name="PasswordConfirm" value="" required>
                <div class="invalid-feedback">
                    <?= isset($errors['passwordConfirmErr']) ? $errors['passwordConfirmErr'] : ''?>
                </div>
            </div>
            
                <button type="submit" class="btn btn-primary">Ajouter</button>
                <button type="reset" class="btn btn-secondary" onclick="window.location.href = 'index.php'">Retour</button>
        </form>
    </div>
