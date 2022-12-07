<?php
    include("../bdd/connexion_bdd.php");
    
    if (isset($_POST['valider']) && isset($_POST['pseudo']) && isset($_POST['password'])) {
        $pseudo = $_POST["pseudo"];
        $password = $_POST["password"];
        $requser=$pdo->prepare("SELECT*FROM utilisateurs WHERE pseudo=?");
        $requser->execute([$pseudo]);
        $userexist=$requser->fetch(PDO::FETCH_OBJ);

            if($userexist && password_verify($password, $userexist->mdp)) {
                $userinfo=$requser->fetch();
                $_SESSION['id']=$userinfo['pseudo'];
                header("location:../index.php");
            } else{
                echo "Mauvais login ou mot de passe!";
        }  
    }
    
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>

    <!-- <div id="accueil">
        <?php include 'accueil.php'; ?>
    </div>  -->

    <h1>Se connecter</h1>
<form  name="form"  method="post"  action="">
<input  type="text"  name="pseudo"  placeholder="Votre Pseudo"  /><br  />
<input  type="password"  name="password"  placeholder="Mot de passe"  /><br  />
<input  type="submit"  name="valider"  value="S'authentifier"  />
<a  href="inscription.php">Créer votre Compte</a>
</form>

</body>
</html>