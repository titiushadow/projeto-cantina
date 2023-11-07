<!DOCTYPE html>
<html>
<head>
    <title>Listagem de Sugestões</title>
    <?php include '../components/imports/imports.php' ?>
</head>
<body>
    <?php
        include '../components/sidebar.php';
    ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <h1 class="text-muted">Lista de sugestões</h1>
        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'projeto-cantina');

            if (!$conn) {
                die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
            }

            $sql = "SELECT ID, titulo, comentario FROM sugestoes";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
        ?>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Comentario</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                            echo "<td>{$row['ID']}</td>";
                            echo "<td>{$row['titulo']}</td>";
                            echo "<td>{$row['comentario']}</td>";
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
                    <th>Titulo</th>
                    <th>Comentarios</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['ID']}</td>";
                        echo "<td>{$row['titulo']}</td>";
                        echo "<td>{$row['comentario']}</td>";
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
