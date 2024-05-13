<?php
// Configurações do banco de dados
$hostname = "localhost"; // Host do banco de dados
$usuario = "root"; // Nome de usuário do banco de dados
$senha = "Admin123@"; // Senha do banco de dados
$bancodedados = "usuario"; // Nome do banco de dados

$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
if ($mysqli->connect_errno) {
    echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
