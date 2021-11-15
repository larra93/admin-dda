<?php

$link='mysql:host=localhost;dbname=detallesdeamor';
$usuario='root';
$pass='';


try {
   $pdo= new PDO($link,$usuario,$pass);
   $pdo->query("SET NAMES 'utf8'");
  

    
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>