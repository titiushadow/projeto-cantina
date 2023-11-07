<?php
// Conexão com o banco de dados (inclua o arquivo de conexão se necessário)
require('./conexao.php');

if (isset($_POST['ficha']) && isset($_POST['ativo']) && isset($_POST['nome'])) {
    $ficha = $_POST['ficha'];
    $ativo = $_POST['ativo'];
    $nome = $_POST['nome'];

    // Atualize a tabela "refeicaoAlunos" com os dados do aluno
    $query = "INSERT INTO refeicaoAlunos (ativo, nome) VALUES (?, ?)
              ON DUPLICATE KEY UPDATE ativo = VALUES(ativo), nome = VALUES(nome)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'is', $ativo, $nome);
    mysqli_stmt_execute($stmt);

    // Responda com uma mensagem de sucesso (pode ser usado para atualização em tempo real na tela do administrador)
    echo "Atualização bem-sucedida";
}
?>
