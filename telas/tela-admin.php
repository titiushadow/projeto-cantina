<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Admin</title>
    <?php include '../components/imports/imports.php';
    
        require_once('../backend/conexao.php');
        $sql = "SELECT ID_cardapio, Data_semana, Prato, nomePrato FROM cardapio";
        $result = mysqli_query($conn, $sql);

        $idItem = 0; 
        while ($row = mysqli_fetch_assoc($result)) {
            $idItem = $row['ID_cardapio']; 
        }
    ?>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php
                include '../components/sidebar.php';
                include '../backend/cardapio-data.php';
            ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h1 class="text-muted text-center mt-5">Painel do Administrador</h1>
                <div class="container mt-4 border border-1 main-card">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Cardápio da semana</h2>
                        </div>
                        <div class="col-md-6 text-end">
                            <p>
                                <?php 
                                    echo date('d/m/Y'); 
                                ?>
                            </p>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <h3 class="mb-3 mt-3">Dias da semana</h3>
                            <?php
                                include '../components/card-cardapio.php';
                                if($idItem == 0) {
                                    echo"<div class='alert alert-danger text-center w-50 mx-auto'>";
                                    echo"Nenhum cardapio cadastrado!";
                                    echo"</div>";
                                }
                            ?>
                        </div>

                        <div class="col-md-6">
                            <h2 class="mt-3 mb-3 text-center">Sujestões e comentarios</h2>
                            <ol class="list-group gap-2">
                                <?php 
                                include '../backend/comentario/comentario-data.php';
                                include '../components/list-comentarios.php';

                                if (empty($comentarios)) { 
                                    echo '<div class="alert alert-danger text-center">Não há comentários.</div>';
                                } else {
                                    $comentarios;
                                }
                                ?>
                            </ol>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
