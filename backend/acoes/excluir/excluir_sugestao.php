<?php
require('../../conexao.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql_delete_sugestao = "DELETE FROM sugestoes WHERE ID = ?";

    $stmt = mysqli_prepare($conn, $sql_delete_sugestao);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: ../../../../../../projeto-cantina/Listagem/Listagem-sugestoes.php");
        } else {
            echo "Erro ao excluir sugestão: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Erro ao preparar a instrução: " . mysqli_error($conn);
    }
}
?>
