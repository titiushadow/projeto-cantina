<?php
    $conn = mysqli_connect('localhost', 'root', '', 'projeto-cantina');

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']) && isset($_POST['VaiComer'])) {
        $id = $_POST['id'];
        $vaiComer = $_POST['VaiComer'];

        $updateQuery = "UPDATE cardapio SET VaiComer = $vaiComer WHERE ID = $id";
        $updateResult = mysqli_query($conn, $updateQuery);

        if ($updateResult) {
            echo "Atualização realizada com sucesso!";
        } else {
            echo "Erro na atualização: " . mysqli_error($conn);
        }
    } else {
        echo "Parâmetros inválidos recebidos ou requisição inválida.";
    }
?>
