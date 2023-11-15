<?php
require('../../conexao.php');

if (isset($_GET['id'])) {
    $id_aluno = $_GET['id'];

    $sql_delete_refeicoes = "DELETE FROM refeicaoalunos WHERE ID_aluno = $id_aluno";
    mysqli_query($conn, $sql_delete_refeicoes);

    $sql_delete_aluno = "DELETE FROM alunos WHERE ID_aluno = $id_aluno";

    if (mysqli_query($conn, $sql_delete_aluno)) {
        header("Location: ../../../../../../projeto-cantina/Listagem/Listagem-alunos.php");
    } else {
        echo "Erro ao excluir aluno: " . mysqli_error($conn);
    }
}
?>
