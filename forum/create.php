<?php 

    require_once '../bdd/connexion_bdd.php';

	if(isset($_POST['titre']) && isset($_POST['contenu'])){
		$titre = $_POST['titre'];
		$contenu = $_POST['contenu'];

		$sql = "INSERT INTO sujets (titre, contenu) VALUES (:titre, :contenu)";
		
		
		$res = $pdo->prepare($sql);
		$result = $res->execute(array(
            "titre" => $_POST['titre'],
            "contenu" => $_POST['contenu']));

		$res -> closeCursor();

		if($result){
			echo 'Nouveau Sujet'.
			'<br>Titre : '.$titre.
			'<br> contenu : '.$contenu.'<br>';
		} else {
			echo "Echec de l'opération";
		}

	}
    

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        
    <form method="post" action="" autocomplete="off">
        <div class="row gtr-uniform">
            <div class="col-12 col-12-xsmall">
            <input type="text" name="titre" id="sujet" placeholder="Titre du sujet" /></div>

            <div class="col-12">
            <textarea name="contenu" id="contenu" placeholder="Contenu" rows="4"></textarea></div>
            <div class="col-12">
                <ul class="actions special">
                    <li><input type="submit" value="Ajouter" class="primary" /></li>
                </ul>
            </div>
        </div>
    </form>

    </body>
</html>