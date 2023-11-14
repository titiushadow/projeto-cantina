<?php
require('../../conexao.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM alunos WHERE ID_aluno = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../../../../../../projeto-cantina/Listagem/Listagem-alunos.php");
    } else {
        echo "Erro ao excluir aluno: " . mysqli_error($conn);
    }
}
?>
