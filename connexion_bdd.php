<?php

function pdo_connect() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'forum_dev';

    try{
        return new PDO('mysql:host='.$DATABASE_HOST. ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch(PDOException $exception) {
        exit('failed to connect bdd');
    }
}

// $serveur  = "localhost";
// $database = "forum_dev"; //exo_diag_php_bdd
// $user     = "root";
// $password = "";

// $conn = new PDO('mysql:host='.$serveur.';dbname='.$database.'', $user, $password);

?>