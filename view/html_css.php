<?php session_start();?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sujet: HTML / CSS</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/topic.css">
</head>

<body>

<?php
include('../composant/header.php');
?>

<div id="main">
        <h1>Forum HTML / CSS</h1>
        <div id="addBtn" onclick="openCreateDialog()">+</div>
        <div id="list"></div>
    </div>

    <!-- fenêtre de création de nouveau todo -->
    <div class="modal" id="modal1">
        <div style="width:100%;text-align:right"><span class="closeBtn" onclick="closeCreateDialog()">X</span></div>
        <h2>-- create new Todo --</h2>
        <p id="title" class="TitleTxtarea" contenteditable>&nbsp;</p>
        <p class="pseudoTxtarea" id="content" contenteditable>&nbsp;</p>
        <div style="text-align:center;"><span class="pseudoBtn" onclick="createTopic()">Créer</span></div>
    </div>

    <!-- fenêtre de mise à jour d'un todo existant -->
    <div class="modal" id="modal2">
    </div>

<div class="new">
    <p><a href="../forum/create.php" onclick="createTopic()">Nouveau sujet</a></p>
</div> 



<?php
include('../composant/footer.php');
?>

<script src="../assets/js/script.js"></script>
</body>

</html>

