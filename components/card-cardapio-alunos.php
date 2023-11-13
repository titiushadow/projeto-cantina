<?php
$currentDay = null;

$query = "SELECT ID, Data_semana, Prato, nomePrato, VaiComer FROM cardapio";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $idItem = $row['ID']; 
    $dataSemana = $row['Data_semana'];
    $prato = $row['Prato'];
    $nomePrato = $row['nomePrato'];
    $vaiComer = $row['VaiComer'];

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
    echo '<input class="form-check-input switch-aluno" type="checkbox" id="flexSwitchCheckDefault" data-id="' . $idItem . '">';

    // Aqui você pode adicionar um label personalizado
    echo '<label class="form-check-label" for="flexSwitchCheckDefault">';
    echo 'Vou comer: <span id="switch-label' . $idItem . '">' . ($vaiComer ? 'Sim' : 'Não') . '</span>';
    echo '</label>';
    
    echo '</div>';
    echo "</div>";    
}

if ($currentDay !== null) {
    echo "</div></div>";
}
?>

<script src="../js/script.js"></script>
