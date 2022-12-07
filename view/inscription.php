<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <form method="POST" action="inscription.php">
        <div>
            <span class="pseudo">Pseudo</span>
            <input type="text" placeholder="Votre pseudo" name="pseudo">
        </div>
        <div>
            <span class="mail">Adresse e-mail</span>
            <input type="email" placeholder="Votre adresse e-mail" name="mail">
        </div>
        <div>
            <span class="password">Mot de passe</span>
            <input type="password" placeholder="Votre mot de passe" name="password">
        </div>
        <div>
            <span class="confirm_password">Confirmation mot de passe</span>
            <input type="password" placeholder="Confirmez votre mot de passe" name="confirm_password">
        </div>
        <div>
            <input type="checkbox" name="check_inscription">Je suis d'accord avec les conditions générales d'utilisation et politique de confidentialité.
        </div>
        <div>
            <input type="submit" name="submit" value="Créer mon compte">
        </div>
    </form>
</body>
</html>

<?php
session_start();
require_once("../bdd/connexion_bdd.php");


if(isset($_POST["submit"]) && isset($_POST["pseudo"]) && isset($_POST["mail"]) && isset($_POST["password"]) && isset($_POST["confirm_password"]) && $_POST["password"] === $_POST["confirm_password"] && isset($_POST["check_inscription"]) ) {
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
