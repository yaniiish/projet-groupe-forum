<?php

include("../composant/header.php");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/formulaire.css">
    <title>Inscription</title>
</head>
<body>

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
   
</body>
</html>

<?php
require_once("../bdd/connexion_bdd.php");


if(!empty($_POST["submit"]) && !empty($_POST["pseudo"]) && !empty($_POST["mail"]) && !empty($_POST["password"]) && !empty($_POST["confirm_password"]) && $_POST["password"] === $_POST["confirm_password"] && !empty($_POST["check_inscription"]) ) {
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

<?php

include("../composant/footer.php");

?>