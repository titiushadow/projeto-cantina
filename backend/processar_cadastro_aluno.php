<?php
    require('../backend/conexao.php');

    if (isset($_POST['cadastrar'])) {
        $nome = $_POST['nome'];
        $turma = $_POST['turma'];
        $numero_ficha = $_POST['numero_ficha'];
        $email = $_POST['email'];
        $senha = $_POST['senha']; 

        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO alunos (Nome, Turma, Numero_ficha, email, senha) VALUES ('$nome', '$turma', '$numero_ficha', '$email', '$senha_hash')";

        if (mysqli_query($conn, $sql)) {
            header("Location: ../Listagem/Listagem-alunos.php");
        } else {
            echo "Erro ao cadastrar aluno: " . mysqli_error($conn);
        }
    }
?>
