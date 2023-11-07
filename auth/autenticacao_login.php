<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    $tipo_usuario = $_POST['tipo_usuario'];

    include '../backend/conexao.php';

    if ($tipo_usuario === 'admin' || $tipo_usuario === 'aluno') {
        $table = ($tipo_usuario === 'admin') ? 'administrador' : 'alunos';

        if (isset($conn)) {
            $sql = "SELECT * FROM $table WHERE Email='$usuario' AND Senha='$senha'";
            $result = $conn->query($sql);

            if ($result === false) {
                die("Erro na consulta: " . mysqli_error($conn));
            }

            if ($result->num_rows > 0) {
                $_SESSION['usuario'] = $usuario;
                $_SESSION['tipo_usuario'] = $tipo_usuario;

                if ($tipo_usuario === 'admin') {
                    header("Location: ../telas/tela-admin.php");
                    exit();
                } elseif ($tipo_usuario === 'aluno') {
                    header("Location: ../telas/tela-user.php");
                    exit();
                }
            } else {
                echo "Login falhou. Por favor, verifique seu nome de usuário e senha.";
            }
        } else {
            echo "Erro na conexão com o banco de dados.";
        }
    } else {
        echo "Tipo de usuário inválido.";
    }
}
?>
