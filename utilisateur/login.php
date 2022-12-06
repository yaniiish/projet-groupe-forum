<?php
    include("../connexion.php");

    @$nom = $_POST["nom"];
    @$prenom = $_POST["prenom"];
    @$pseudo = $_POST["pseudo"];
    @$password = $_POST["password"];
    @$passwordConf = $_POST["passconf"];
    @$pass_crypt = md5($_POST["password"]);

    session_start();
    @$valider = $_POST["valider"];
    $erreur = "";
    if (isset($valider)) {
    
    $verify = $pdo->prepare("select * from utilisateurs where pseudo=? and password=? limit 1");
    $verify->execute(array($pseudo, $pass_crypt));
    $user = $verify->fetchAll();
    if (count($user) > 0) {
    $_SESSION["prenom_nom"] = ucfirst(strtolower($user[0]["prenom"])) .
    " "  .  strtoupper($user[0]["nom"]);
    $_SESSION["connecter"] = "yes";
    header("location:session.php");
    } else
    $erreur = "Mauvais login ou mot de passe!";
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
</head>
<body>

    <h1>Se connecter</h1>

    <div  class="erreur"><?php  echo  $erreur  ?></div>
<form  name="form"  method="post"  action="">
<input  type="text"  name="pseudo"  placeholder="Votre Pseudo"  /><br  />
<input  type="password"  name="password"  placeholder="Mot de passe"  /><br  />
<input  type="submit"  name="valider"  value="S'authentifier"  />
<a  href="inscription.php">Créer votre Compte</a>
</form>

</body>
</html>