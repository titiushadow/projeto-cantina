<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <div class="border border-2">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">&#10060;</button>
                </div>
            </div>
            <div class="modal-body">
                <!-- Conteúdo do modal -->
            </div>
            <div class="modal-footer">
                <?php 
                while ($row = mysqli_fetch_assoc($result)) {                        
                    $idItem = $row['ID'];
                }
                echo "<form method='POST' action='../backend/acoes/excluir/excluir_cardapio.php'>";
                    echo "<input type='hidden' name='id' id='modalItemId' value='$idItem'>";
                    echo "<div class='d-flex gap-2'>";
                        echo "<a href='../backend/acoes/editar/editar-cardapio.php?id=$idItem' class='btn btn-warning'>Editar</a>";
                        echo "<button type='submit' class='btn btn-danger' name='excluirItem'>Excluir</button>";
                        echo "<button type='button' class='btn btn-success' data-dismiss='modal'>Cancelar</button>";
                    echo "</div>";
                echo "</form>";
                
                ?>
            </div>
        </div>
    </div>
</div>
