<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Atividade_14";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexao falhou: " . $conn->connect_error);
}
?>