<?php

$host = "localhost";
$usuario = "root";
$senha = "1234";
//$senha = "&tec77@info!";
$database = "agenda_db";


$mysqli = new mysqli($host, $usuario, $senha, $database);

if ($mysqli->connect_error) {
    die("ERRO NA CONEXÃO: " . $mysqli->connect_error);
}

?>