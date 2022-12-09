<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <link rel="stylesheet" href="../assets/css/formulaire.css">
    <link rel="stylesheet" href="../assets/css/generique.css">
    <link rel="stylesheet" href="../assets/css/modal.css">
</head>

<body>

<!-- fenetre modale -->
<div class="modal" id="modal1">
    <div style="width:100%;text-align:right"><span class="closeBtn" onclick="closeModal()">X</span></div>
    <h2>-- create new Todo --</h2>
    <p id="content" class="pseudoTxtarea" contenteditable>&nbsp;</p>
    <div style="text-align:center;"><span class="pseudoBtn" onclick="envoyerMail()">Créer</span></div>
</div>
<!-- -->

<div class="wrap">

    <div class="header">
        <?php include '../composant/header.php'; ?>
    </div>

    <div class="main">
        <div class="formulaire">
            <h1>Se connecter</h1>
            <form name="form" method="POST" action="login.php">
                <div>
                    <input type="text"  class="input-text" placeholder="Votre pseudo" name="pseudo">
                </div>
                <div>
                    <input type="password" class="input-text" placeholder="Votre mot de passe" name="password">
                </div>
                <div id="recup-id">
                    <a id="recup-id1" href="" >Récupérer mes identifiants</a>
                </div>

                <?php
                    require_once("../bdd/connexion_bdd.php");
                        
                    if (!empty($_POST['valider']) && !empty($_POST['pseudo']) && !empty($_POST['password'])) {
                        $pseudo = $_POST["pseudo"];
                        $password = $_POST["password"];
                        $requser=$pdo->prepare("SELECT*FROM utilisateurs WHERE pseudo=?");
                        $requser->execute([$pseudo]);
                        $userexist=$requser->fetch(PDO::FETCH_OBJ);

                        if($userexist && password_verify($password, $userexist->mdp)) {
                            $userinfo=$requser->fetch();
                            $_SESSION['id']=$userinfo['pseudo'];
                            session_start();
                            $_SESSION['pseudo'] = $_POST['pseudo'];
                            header("location:index.php");
                        } else{
                            echo "<p style='color:red'>Mauvais login ou mot de passe!</p>";
                        }  
                    }       
                ?>
                <div class="btn">
                    <input type="submit" name="valider" value="valider">
                </div>
            </form>
        </div>
    </div>

    <div class="footer">
        <?php
        include('../composant/footer.php');
        ?>
    </div>

</div>
<script src="../assets/js/login.js"></script>
</body>
</html>