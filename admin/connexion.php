<?php
$hote='localhost'; // le chemin vers le serveur
$bdd='alainlortal_cvsite'; // le nom de la base de données
$utilisateur='root'; // le nom de l'utilisateur pour se connecter
//$passe=''; // le mot de passe local 
$passe='root'; // le mot de passe MAC

$pdoCV = new PDO ('mysql:host=' . $hote . ';dbname='. $bdd, $utilisateur, $passe);
//$pdoCV est le nom de la varaible de la connexion qui sort partout où l'on doit se servir de cette connexion
$pdoCV->exec("SET NAMES utf8");
?>