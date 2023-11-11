<!DOCTYPE html>
<html>
<head>
    <title>Formulário de Cadastro de Alunos</title>
    <?php include '../components/imports/imports.php' ?>
    <script src="../js/script.js" defer></script>
</head>
<body>
    <?php 
        include '../components/sidebar.php'
    ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <h1 class="mb-4 text-center">Cadastro de Alunos</h1>
        <form method="POST" action="../backend/processar_cadastro_aluno.php">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" name="nome" required>
            </div>

            <div class="mb-3">
                <label for="turma" class="form-label">Turma:</label>
                <input type="text" class="form-control" name="turma" required>
            </div>

            <?php
                $numero_ficha = str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);
            ?>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label">Senha:</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="senha" id="senha" required>
                    <button type="button" class="btn btn-primary" onclick="gerarSenha()">Gerar Senha</button>
                </div>
            </div>

            <div class="mb-3">
                <label for="numero_ficha" class="form-label">Número de Ficha:</label>
                <input type="text" class="form-control" name="numero_ficha" disabled value="<?php echo $numero_ficha; ?>" readonly>
            </div>

            <button type="submit" name="cadastrar" class="btn btn-success">Cadastrar</button>
        </form>
    </main>
</body>
</html>
