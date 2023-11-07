<!DOCTYPE html>
<html>
<head>
    <title>Formulário de Cadastro de refeições</title>
    <?php include '../components/imports/imports.php' ?>
</head>
<body>
    <?php 
        include '../components/sidebar.php'
    ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <h1 class="text-center mb-4">Cadastro de refeições</h1>
        <form method="post" action="../backend/processar_cadastro_cardapio.php">
            <div class="mb-3">
                <label for="nomePrato" class="form-label">Nome do prato:</label>
                <input class="form-control" id="nomePrato" name="nomePrato" rows="4" required placeholder="Ex: Macarrão"></input>
            </div>

            <div class="mb-3">
                <label for="diaSemana" class="form-label">Dia da semana:</label>
                <select class="form-select w-50" id="diaSemana" name="data_semana" required>
                    <option value="" disabled selected>Selecione o dia da semana</option>
                    <option value="segunda">Segunda</option>
                    <option value="terca">Terça</option>
                    <option value="quarta">Quarta</option>
                    <option value="quinta">Quinta</option>
                    <option value="sexta">Sexta</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="pratoDia" class="form-label">Descrição:</label>
                <textarea class="form-control" id="pratoDia" name="Prato" rows="4" required placeholder="Descreva o prato..."></textarea>
            </div>

            <button type="submit" name="cadastrarCardapio" class="btn btn-success">Cadastrar Refeição</button>
        </form>
    </main>
</body>
</html>
