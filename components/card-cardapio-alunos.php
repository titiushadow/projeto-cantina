<?php
$currentDay = null;
$query = "SELECT c.ID_cardapio, c.Data_semana, c.Prato, c.nomePrato, r.VaiComer AS VaiComer, r.ID_aluno 
        FROM cardapio c
        LEFT JOIN refeicaoalunos r ON c.ID_cardapio = r.ID_cardapio";

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Erro na consulta ao banco de dados: " . mysqli_error($conn));
}

while ($row = mysqli_fetch_assoc($result)) {
    $idItem = $row['ID_cardapio'];
    $dataSemana = $row['Data_semana'];
    $prato = $row['Prato'];
    $nomePrato = $row['nomePrato'];
    $vaiComer = $row['VaiComer'];
    $ID_aluno = $row['ID_aluno'];

    if ($dataSemana != $currentDay) {
        if ($currentDay !== null) {
            echo "</div></div>";
        }

        echo "<div class='card mt-3'>";
        echo "<div class='card-body'>";
        echo "<h5>{$dataSemana}</h5>";
        $currentDay = $dataSemana;
    }

    echo "<div class='d-flex flex-column'>";
    echo "<ul>";
    echo "<h6>Prato do dia: </h6>";
    echo "<li class='mx-5'>{$nomePrato}</li>";
    echo "<br>";

    echo "<h6>Descrição: </h6>";
    echo "<li class='mx-5' style='text-align: justify;'>{$prato}</li>";
    echo "</ul>";
    echo "</div>";

    // Switch votação
    echo "<div class='d-flex justify-content-end'>";
    echo '<div class="form-check form-switch">';
    echo "<input class='form-check-input switch-aluno' type='checkbox' id='flexSwitchCheckDefault{$idItem}' data-id='{$ID_aluno}' data-vai-comer='{$vaiComer}'";
    if ($vaiComer == 1) {
        echo ' checked';
    }
    echo '>';
    echo "<label class='form-check-label' for='flexSwitchCheckDefault{$idItem}'>";
    echo "Vou comer: <span id='switch-label{$ID_aluno}'>" . ($vaiComer == 1 ? 'Sim' : 'Não') . "</span>";
    echo "</label>";

    echo "</div>";
    echo "</div>";
}

if ($currentDay !== null) {
    echo "</div></div>";
}
?>
<script src="../js/script.js"></script>
