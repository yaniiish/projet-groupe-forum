<?php
    include("../connexion.php");
    $pseudo = $_POST["pseudo"];
    $password = $_POST["password"];
    $valider = $_POST["valider"];
    $erreur = "";
    if (isset($valider) && isset($pseudo) && isset($password)) {
        $verify = $pdo->prepare("select * from utilisateurs where pseudo=? and password=?");
        $verify->execute(array($pseudo, $password));
        $user = $verify->fetchAll();
        if (count($user) > 0) {
        $_SESSION["pseudo"] = ucfirst(strtolower($user[0]["pseudo"])) .
        " "  .  strtoupper($user[0]["nom"]);
        $_SESSION["connecter"] = "yes";
        header("location:../accueil.php");
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
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>

    <div id="accueil">
        <?php include '../accueil.php'; ?>
    </div> 

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