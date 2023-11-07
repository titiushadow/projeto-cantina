<!DOCTYPE html>
<html>
<head>
    <title>Listagem de Alunos</title>
    <?php include '../components/imports/imports.php' ?>
</head>
<body>
    <?php
        include '../components/sidebar.php';
    ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <h1 class="text-muted">Lista de alunos</h1>
        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'projeto-cantina');

            if (!$conn) {
                die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
            }

            $sql = "SELECT ID, Nome, Turma, Numero_ficha, email FROM alunos";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
        ?>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Turma</th>
                    <th>Ficha</th>
                    <th>Email</th>
                    <th>Operações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['ID']}</td>";
                        echo "<td>{$row['Nome']}</td>";
                        echo "<td>{$row['Turma']}</td>";
                        echo "<td>{$row['Numero_ficha']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "<td>
                            <a href='../backend/acoes/excluir/excluir_aluno.php?id={$row['ID']}' class='btn btn-danger'>Excluir</a>
                            <a href='../backend/acoes/editar/editar-aluno.php?id={$row['ID']}' class='btn btn-warning'>Editar</a>
                        </td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <?php
            } else {
                // Exibir a mensagem em um alerta com fundo vermelho
        ?>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Turma</th>
                    <th>Ficha</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['ID']}</td>";
                        echo "<td>{$row['Nome']}</td>";
                        echo "<td>{$row['Turma']}</td>";
                        echo "<td>{$row['Numero_ficha']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
            <div class="alert alert-danger text-center w-50 mx-auto">
                Nenhum registro cadastrado
            </div>
        <?php
            }
            mysqli_close($conn);
        ?>
    </main>
</body>
</html>
