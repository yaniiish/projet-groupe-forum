<?php

require '../bdd/connexion_bdd.php';

require './create.php';

$mysql = $pdo->prepare("select * from sujets");
		$mysql ->execute();

		$fetch = $mysql ->fetchAll();


		$jsonall = json_encode($fetch,JSON_PRETTY_PRINT);


		echo $jsonall;

?>