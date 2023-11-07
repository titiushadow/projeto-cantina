<?php
$comentarios = array();

while ($row = mysqli_fetch_assoc($result)) {
    $titulo = $row['titulo']; 
    $comentario = $row['comentario'];
    
    $comentarios[] = array('titulo' => $titulo, 'comentario' => $comentario);
}

foreach ($comentarios as $comentario) {
    echo "<li class='list-group-item list-group-item-info'><strong>{$comentario['titulo']}:</strong> {$comentario['comentario']}</li>";
}
?>
