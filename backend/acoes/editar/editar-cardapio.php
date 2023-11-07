<!DOCTYPE html>
<html>
<head>
    <title>Editar Cardápio</title>
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="../../../css/style.css">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--  Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script></head>
<body>
    <?php include '../../../components/sidebar.php'; ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <h1 class="text-muted">Editar Cardápio</h1>

        <?php
        if (isset($_GET['id'])) {
            $conn = mysqli_connect('localhost', 'root', '', 'projeto-cantina');

            if (!$conn) {
                die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
            }

            $id = $_GET['id'];

            $sql = "SELECT ID, nomePrato, Data_semana, Prato FROM cardapio WHERE ID = '$id'";
            
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $prato = mysqli_fetch_assoc($result);
        ?>
        <form method="post" action="../../processar_edicao_cardapio.php">
            <input type="hidden" name="id" value="<?php echo $prato['ID']; ?>">

            <div class="mb-3">
                <label for="nomePrato" class="form-label">Nome do Prato:</label>
                <input type="text" class="form-control" name="nomePrato" value="<?php echo $prato['nomePrato']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="Data_semana" class="form-label">Dia da Semana:</label>
                <select class="form-select w-50" name="Data_semana" required>
                    <option value="segunda" <?php if ($prato['Data_semana'] == 'segunda') echo 'selected'; ?>>Segunda</option>
                    <option value="terca" <?php if ($prato['Data_semana'] == 'terca') echo 'selected'; ?>>Terça</option>
                    <option value="quarta" <?php if ($prato['Data_semana'] == 'quarta') echo 'selected'; ?>>Quarta</option>
                    <option value="quinta" <?php if ($prato['Data_semana'] == 'quinta') echo 'selected'; ?>>Quinta</option>
                    <option value="sexta" <?php if ($prato['Data_semana'] == 'sexta') echo 'selected'; ?>>Sexta</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="Prato" class="form-label">Descrição do Prato:</label>
                <textarea class="form-control" name="Prato" rows="4" required><?php echo $prato['Prato']; ?></textarea>
            </div>

            <button type="submit" name="editar" class="btn btn-primary">Salvar Alterações</button>
        </form>
        <?php
            } else {
                echo "Cardápio não encontrado.";
            }
        } else {
            echo "ID do cardápio não especificado.";
        }
        ?>
    </main>
</body>
</html>
