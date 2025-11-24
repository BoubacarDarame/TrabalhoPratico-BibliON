<?php

$user = 'admin';
$pass = 'admin';

try {
    $dbh = new PDO('mysql:host=localhost;dbname=biblion', $user, $pass);
} catch (PDOException $e) {
    // attempt to retry the connection after some timeout for example
    echo 'Erro';
}

?>