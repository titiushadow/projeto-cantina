<?php
require('./conexao.php');

if (isset($_POST['editar'])) {
    $id = $_POST['id'];
    $nomePrato = $_POST['nomePrato'];
    $Data_semana = $_POST['Data_semana'];
    $Prato = $_POST['Prato'];

    $sql = "UPDATE cardapio SET nomePrato = '$nomePrato', Data_semana = '$Data_semana', Prato = '$Prato' WHERE ID_cardapio = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../../../../projeto-cantina/telas/tela-admin.php");
    } else {
        echo "Erro ao editar aluno: " . mysqli_error($conn);
    }
}
?>
