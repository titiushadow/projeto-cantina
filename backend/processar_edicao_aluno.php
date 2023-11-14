<?php
require('./conexao.php');

if (isset($_POST['editar'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $turma = $_POST['turma'];
    $email = $_POST['email'];
    $Numero_ficha = $_POST['Numero_ficha'];

    // Você pode adicionar os campos adicionais, como email e número de ficha, aqui

    $sql = "UPDATE alunos SET Nome = '$nome', Turma = '$turma', Email = '$email', Numero_ficha = '$Numero_ficha' WHERE ID_aluno = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: /projeto-cantina/Listagem/Listagem-alunos.php");
    } else {
        echo "Erro ao editar aluno: " . mysqli_error($conn);
    }
}
?>
