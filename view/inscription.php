<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="../assets/css/formulaire.css">
    <link rel="stylesheet" href="../assets/css/generique.css">
</head>
<body>

<div class="wrap">
    <div class="header">
        <?php include("../composant/header.php");?>
    </div>

    <div class="main">
        <div class="formulaire">
            <h1>S'inscrire</h1>
            <form method="POST" action="inscription.php">
                <div>
                    <input type="text"  class="input-text" placeholder="Votre pseudo" name="pseudo">
                </div>
                <div>
                    <input type="email" class="input-text" placeholder="Votre adresse e-mail" name="mail">
                </div>
                <div>
                    <input type="password" class="input-text" placeholder="Votre mot de passe" name="password">
                </div>
                <div>
                    <input type="password" class="input-text" placeholder="Confirmez votre mot de passe" name="confirm_password">
                </div>
                <div class="check">
                    <input class="checkbox" type="checkbox" name="check_inscription">
                    <p>Je suis d'accord avec les conditions générales d'utilisation et politique de confidentialité.</p>
                </div>
                <div class="btn">
                    <input type="submit" name="submit" value="Créer mon compte">
                </div>
            </form>
        </div>
    </div>

    <div class="footer">
        <?php include("../composant/footer.php");?>
    </div>
</div>
   
</body>
</html>

<?php
require_once("../bdd/connexion_bdd.php");

$erreur = [];

// VERIF POUR LE PSEUDO (pas vide, string, uniquement des chiffres et des lettres, 20 caractères max)
if(isset($_POST) && array_key_exists('pseudo', $_POST)){
    if (!empty($_POST["pseudo"])){
        if (is_string($_POST["pseudo"])){
            if(ctype_alnum($_POST["pseudo"])){
                if(strlen($_POST["pseudo"]) < 20){
    
                } else {
                    $erreur[] = "Le pseudo doit être de 20 caractères maximum !";
                }
            } else {
            $erreur[] = "Le pseudo doit contenir uniquement des chiffres et des lettres !";
            }
        } else {
            $erreur[] = "Le pseudo n'est pas une chaine de caractère !";
        }
    } else {
        $erreur[] = "Le pseudo est vide !";
    }
}




//VERIF POUR LE MAIL (pas vide, adresse mail valide, string, pas dans la bdd)
if(isset($_POST) && array_key_exists('mail', $_POST)){
    if (!empty($_POST['mail'])){
        if (is_string($_POST['mail'])){
            if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
    
            } else {
                $erreur[] = 'Votre mail n\'est pas considéré comme valide !';
            }
        } else {
            $erreur[] = "Le mail n'est pas une chaine de caratère !";
        }
    } else {
        $erreur[] = "Le mail est vide !";   
    }
}



//VERIF POUR LE PASS (mini 6 cara, même mot de passe)
if(isset($_POST) && array_key_exists('password', $_POST)){
    if(!empty($_POST['password'])){
        if(strlen($_POST['password']) > 6){
            if($_POST['password'] == $_POST['confirm_password']){
    
            } else {
                $erreur[] = "Les mots de passe ne sont pas identiques !";
            }
        } else {
            $erreur[] = "Le mot de passe doit être supérieur à 6 caractères !";
        }
    } else {
        $erreur[] = "Le mot de passe est vide !";
    }
}





if (count($erreur) > 0) {
foreach ($erreur as $erreurs) {
  echo '<p style="color: red">' . $erreurs . '</p>';
  
}
} elseif((!empty($_POST["submit"]) && !empty($_POST["pseudo"]) && !empty($_POST["mail"]) && !empty($_POST["password"]) && !empty($_POST["confirm_password"]) && !empty($_POST["check_inscription"]))) {
    $hash = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $request = $pdo->prepare("INSERT INTO utilisateurs (pseudo, mail, mdp) VALUES (:pseudo, :mail, :mdp)"); 
    $request->execute([
        "pseudo" => $_POST["pseudo"],
        "mail" => $_POST["mail"],
        "mdp" => $hash,
    ]);     
    header('Location:login.php');
}
?>