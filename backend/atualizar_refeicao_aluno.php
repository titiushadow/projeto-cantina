<?php
    $query = "SELECT ID, VaiComer FROM cardapio";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['ID'];
        $vaiComer = $row['VaiComer'];

        $novoValor = $vaiComer == 0 ? 1 : 0;

        $updateQuery = "UPDATE cardapio SET VaiComer = $novoValor WHERE ID = ?";
        mysqli_query($conn, $updateQuery);
    }
?>
