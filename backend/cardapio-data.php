<?php
    $conn = mysqli_connect('localhost', 'root', '', 'projeto-cantina');

    if (!$conn) {
        die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
    }

    $sql = "SELECT ID_cardapio, Data_semana, Prato, nomePrato FROM cardapio";

    $result = mysqli_query($conn, $sql);
?>
