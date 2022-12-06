
<?php

    try{
    $pdo=new PDO("mysql:host=localhost;dbname=forum_dev","root","");
    }
    catch(PDOException $e){
    echo $e->getMessage();
    }
?>