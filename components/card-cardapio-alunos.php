<?php
$currentDay = null;

while ($row = mysqli_fetch_assoc($result)) {
    $idItem = $row['ID']; 
    $dataSemana = $row['Data_semana'];
    $prato = $row['Prato'];
    $nomePrato = $row['nomePrato'];

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
    echo '<div class="form-check form-switch">
        <input class="form-check-input switch-aluno" type="checkbox" id="flexSwitchCheckDefault" data-id="' . $idItem . '">
        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
    </div>';
    echo "</div>";    
}

if ($currentDay !== null) {
    echo "</div></div>";
}
?>

<script src="../js/script.js"></script>


