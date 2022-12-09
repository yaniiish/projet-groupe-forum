<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/burger.css">
</head>

<body>

<div class="bandeau">
    <div id="logo">
        <a href="../view/index.php"><img src="../assets/images/logo_forum.png" alt="logo"></a>
    </div>
    <div class="nom_forum">
        <p>LE FORUM DES DEV'</p>
    </div>



    <div class="boutons">
        <?php if (isset($_SESSION['pseudo'])):?>
            <div class="salutation">
        <?php echo '<p style="color: white">Bonjour ' . $_SESSION['pseudo'] . ' !</p>';?>
        <a href="../utilisateur/deconnexion.php" class="btn deco">Déconnexion</a>
        </div>
        <?php else :?>
        <a href="../view/inscription.php" class="btn">Inscription</a>
        <a href="../view/login.php" class="btn">Connexion</a>
        <?php endif;?>
    </div>
</div>

<div class="sections">
    <ul>
        <li><a href="html_css.php" style="color: white">HTML/CSS</a></li>
        <li><a href="javascript.php" style="color: white">JAVASCRIPT</a></li>
        <li><a href="php.php" style="color: white">PHP</a></li>
        <li><a href="frameworks.php" style="color: white">FRAMEWORKS</a></li>
        <li style="border: none">&#128269;<input type="text" name="search" placeholder="RECHERCHE">&#160;<input type="submit" value="OK"></li>
    </ul>
</div>
    
</body>

</html>