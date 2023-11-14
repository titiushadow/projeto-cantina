<?php
require('../../conexao.php');

if (isset($_POST['excluirItem']) && isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM cardapio WHERE ID_cardapio = '$id'";
    

    if (mysqli_query($conn, $sql)) {
        header("Location: ../../../../../../projeto-cantina/telas/tela-admin.php");
    } else {
        echo "Erro ao excluir o item de cardápio: " . mysqli_error($conn);
    }
}
?>
