<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'db_klinik';

$pdo = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
?>