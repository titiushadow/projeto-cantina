<?php
$conn = mysqli_connect('localhost', 'root', '', 'projeto-cantina');

if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ID_aluno']) && isset($_POST['VaiComer'])) {
    $id_aluno = mysqli_real_escape_string($conn, $_POST['ID_aluno']);
    $vaiComer = mysqli_real_escape_string($conn, $_POST['VaiComer']);

    $updateQuery = "UPDATE refeicaoalunos SET VaiComer = ? WHERE ID_aluno = ?";
    $stmt = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($stmt, "ii", $vaiComer, $id_aluno);
    
    if (mysqli_stmt_execute($stmt)) {
        echo "Atualização realizada com sucesso!";
    } else {
        echo "Erro na atualização do voto: " . mysqli_stmt_error($stmt);
    }
    
    mysqli_stmt_close($stmt);
} else {

    $countQuery = "SELECT COUNT(*) AS count FROM refeicaoalunos WHERE VaiComer = 1";
    $countResult = mysqli_query($conn, $countQuery);
    $count = mysqli_fetch_assoc($countResult);

    // Retorne apenas a contagem
    echo $count['count'];
}
?>
