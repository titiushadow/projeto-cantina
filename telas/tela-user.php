<?php
    require('../backend/conexao.php');

    $sql = "SELECT ID,Data_semana, Prato, nomePrato FROM cardapio";
    $result = mysqli_query($conn, $sql);

    $idItem = 0; 
    while ($row = mysqli_fetch_assoc($result)) {
        $idItem = $row['ID']; 
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tela de Alunos</title>
    <?php include '../components/imports/imports.php' ?>
</head>
<body>
<div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php
                include '../components/sidebar-aluno.php';
                include '../backend/cardapio-data.php';
            ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h1 class="text-muted text-center mt-5">Bem vindo a cantina virtual</h1>
                <div class="container mt-4 border border-1 main-card">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Cardápio da semana</h2>
                        </div>
                        <div class="col-md-6 text-end">
                            <p>
                                <?php echo date('d/m/Y'); ?>
                            </p>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <h3 class="mb-3 mt-3">Dias da semana</h3>
                            <?php
                                include '../components/card-cardapio-alunos.php';
                                if($idItem == 0) {
                                    echo"<div class='alert alert-danger text-center w-50 mx-auto'>";
                                    echo"Nenhum cardapio cadastrado!";
                                    echo"</div>";
                                }
                            ?>
                        </div>

                        <div class="col-md-6 mb-3">
                            <h3 class="mb-3 mt-3 text-center">Caixinha de Sugestões &#x1F600;</h3>

                            <form method="POST" action="../backend/comentario/processar_comentario.php">
                                <div class="mb-3">
                                    <label for="titulo" class="form-label">Titulo:</label>
                                    <input type="text" class="form-control" name="titulo" required>
                                </div>                   
                                
                                <div class="mb-3">
                                    <label for="titulo" class="form-label">Comentario:</label>
                                    <textarea class="form-control" name="comentario" aria-label="With textarea"></textarea>
                                </div>      
    
                                <div class="d-flex justify-content-between">
                                <button type="submit" name="cadastrar" class="btn btn-success">Enviar</button>
                                    <button type="reset" class="btn btn-danger">Limpar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
