<?php
$currentDay = null;

while ($row = mysqli_fetch_assoc($result)) {
    $idItem = $row['ID_cardapio']; 
    $dataSemana = $row['Data_semana'];
    $prato = $row['Prato'];
    $nomePrato = $row['nomePrato'];
    
    // Verificação se 'VaiComer' existe no array antes de usá-lo
    $VaiComer = isset($row['VaiComer']) ? $row['VaiComer'] : ''; 

    if ($dataSemana != $currentDay) {
        if ($currentDay !== null) {
            echo "</div></div>";
        }

        echo "<div class='card mt-3'>";
        echo "<div class='card-body'>";
        echo "<h5>{$dataSemana}</h5>";
        $currentDay = $dataSemana;
    }

    echo "<p>{$prato}</p>";
    echo "<div class='d-flex justify-content-end'>";
    echo "<button class='btn btn-primary btn-sm ver-mais' data-toggle='modal' data-target='#myModal' 
    data-title='{$dataSemana}' 
    data-prato='{$prato}' 
    data-nomePrato='{$nomePrato}' 
    data-id='{$idItem}'
    data-VaiComer='{$VaiComer}'>Ver mais</button>";
    echo "</div>";
}

if ($currentDay !== null) {
    echo "</div></div>";
}
include '../components/modal.php';
?>


<script src="../js/script.js"></script>


