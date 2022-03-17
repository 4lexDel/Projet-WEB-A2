<?php
/*
To do list

Recherche

- filtre
- sql en fonction des champs 
- recupérer son role

*/



// On se connecte à MySQL
$mysqlClient = new PDO('mysql:host=localhost;dbname=projet_web_a2;charset=utf8', 'root', '');

$stmt = $mysqlClient->prepare("SELECT * FROM users WHERE login=? AND password=?");

$stmt->bindParam(1, $_POST["login"]);
$stmt->bindParam(2, $_POST["mdp"]);

$stmt->execute();
$data = $stmt->fetchAll();



?>
