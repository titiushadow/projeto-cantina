<?php
require('../backend/conexao.php');

if (isset($_POST['cadastrarCardapio'])) {
    $data_semana = $_POST['data_semana'];
    $Prato = $_POST['Prato'];
    $nomePrato = $_POST['nomePrato'];

    $sql = "INSERT INTO cardapio (data_semana, Prato, nomePrato) VALUES ('$data_semana', '$Prato', '$nomePrato')";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../telas/tela-admin.php");
    } else {
        echo "Erro ao cadastrar cardápio: " . mysqli_error($conn);
    }
}
?>

