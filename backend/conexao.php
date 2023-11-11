<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'projeto-cantina';

    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
    }
?>
