<?php
require('../conexao.php');

if (isset($_POST['cadastrar'])) {    
    $titulo = $_POST['titulo'];
    $comentario = $_POST['comentario'];

    $sql = "INSERT INTO sugestoes (titulo, comentario) VALUES ('$titulo', '$comentario')";

    if (mysqli_query($conn, $sql)) {
        header("location: ../../../../../projeto-cantina/telas/tela-user.php");
    } else {
        echo "Erro ao enviar a segestão: " . mysqli_error($conn);
    }
}
?>