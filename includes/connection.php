<?php

$host = 'localhost';
$dbname = 'biblion';
$user = 'root';
$pass = '';

try {

    $dbh = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {

    die("Erro na conexão com a base de dados: " . $e->getMessage());

}

?>