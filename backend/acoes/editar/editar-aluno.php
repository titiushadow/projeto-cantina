<!DOCTYPE html>
<html>
<head>
    <title>Editar Aluno</title>
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="../../../css/style.css">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--  Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <?php         
        include '../../../components/sidebar.php';
    ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <h1 class="text-muted">Editar Aluno</h1>

        <?php
        if (isset($_GET['id'])) {
            $conn = mysqli_connect('localhost', 'root', '', 'projeto-cantina');

            if (!$conn) {
                die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
            }

            $id = $_GET['id'];

            $sql = "SELECT ID, Nome, Turma, Numero_ficha, email FROM alunos WHERE ID = $id";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $aluno = mysqli_fetch_assoc($result);
        ?>
        <form method="post" action="../../processar_edicao_aluno.php">
            <input type="hidden" name="id" value="<?php echo $aluno['ID']; ?>">

            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" name="nome" value="<?php echo $aluno['Nome']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="turma" class="form-label">Turma:</label>
                <input type="text" class="form-control" name="turma" value="<?php echo $aluno['Turma']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="text" class="form-control" name="email" value="<?php echo $aluno['email']; ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="Numero_ficha" class="form-label">Ficha:</label>
                <input type="text" class="form-control" name="Numero_ficha" value="<?php echo $aluno['Numero_ficha']; ?>" required>
            </div>

            <button type="submit" name="editar" class="btn btn-primary">Salvar Alterações</button>
        </form>
        <?php
            } else {
                echo "Aluno não encontrado.";
            }
        } else {
            echo "ID de aluno não especificado.";
        }
        ?>
    </main>
</body>
</html>
