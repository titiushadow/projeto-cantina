<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'projeto-cantina';

// Criar uma conexão
$conn = mysqli_connect($host, $username, $password, $database);

// Verificar a conexão
if (!$conn) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}
?>
