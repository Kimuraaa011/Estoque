<?php

$dbname = 'maravilha';
$host = 'localhost';
$pass = '';
$root = 'root';



$pdo = new PDO('mysql:dbname=' . $dbname .';host='. $host, $root, $pass);
