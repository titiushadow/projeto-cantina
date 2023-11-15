<?php
    $comentarios = array();

    $count = 0;

    while ($row = mysqli_fetch_assoc($result)) {
        $titulo = $row['titulo']; 
        $comentario = $row['comentario'];
        
        if ($count < 3) {
            $comentarios[] = array('titulo' => $titulo, 'comentario' => $comentario);
        }

        $count++;
    }

    foreach ($comentarios as $comentario) {
        echo "<li class='list-group-item list-group-item-info'><strong>{$comentario['titulo']}:</strong> {$comentario['comentario']}</li>";
    }
?>
