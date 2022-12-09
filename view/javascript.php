<?php session_start();?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum JAVASCRIPT</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/generique.css">
</head>

<body>

<div class="wrap">
    <div class="header">
        <?php
        include('../composant/header.php');
        ?>
    </div>

    <div class="main">
        <div class="new">
            <p><a href="forum/create.php">Nouveau sujet</a></p>
        </div>  
    </div>

    <div class="footer">
        <?php
        include('../composant/footer.php');
        ?>
    </div>
</div>
    
</body>

</html>

