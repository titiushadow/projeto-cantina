<?php
    $conn = mysqli_connect('localhost', 'root', '', 'projeto-cantina');

    if (!$conn) {
        die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
    }

    $sql = "SELECT ID, titulo, comentario FROM sugestoes";

    $result = mysqli_query($conn, $sql);
?>
