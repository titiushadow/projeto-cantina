<?php
$conn = mysqli_connect('localhost', 'root', '', 'projeto-cantina');

// Suponha que os votos estejam chegando por aluno e com seus respectivos votos 'Sim' ou 'Não'.
$votos = [
    'Aluno1' => 'Sim',
    'Aluno2' => 'Não',
    'Aluno3' => 'Sim'
    // Adicione votos para cada aluno conforme necessário
];

foreach ($votos as $aluno => $voto) {
    $updateQuery = "UPDATE refeicaoalunos SET $aluno = '$voto' WHERE Ficha = 'identificador_da_ficha_do_aluno'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if (!$updateResult) {
        echo "Erro na atualização do voto de $aluno: " . mysqli_error($conn);
        // Você pode optar por parar o loop ou lidar com o erro de outra maneira
    }
}
?>
