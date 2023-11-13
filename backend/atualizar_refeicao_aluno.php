<?php
    // Consulta para selecionar todos os registros
    $query = "SELECT ID, VaiComer FROM cardapio";
    $result = mysqli_query($conn, $query);

    // Loop através dos resultados e atualização dos valores
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['ID'];
        $vaiComer = $row['VaiComer'];

        // Inverte o valor do VaiComer
        $novoValor = $vaiComer == 0 ? 1 : 0;

        // Atualiza o banco de dados
        $updateQuery = "UPDATE cardapio SET VaiComer = $novoValor WHERE ID = ?";
        mysqli_query($conn, $updateQuery);
    }
?>
