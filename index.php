<!DOCTYPE html>
<html>
<head>
    <title>Página de Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-body">
                        <h1 class="card-title text-center">Cantina Etec</h1>
                        <form action="./auth/autenticacao_login.php" method="POST">
                            <div class="mb-3">
                                <label for="usuario" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="usuario" name="usuario" required>
                            </div>
                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha:</label>
                                <input type="password" class="form-control" id="senha" name="senha" required>
                            </div>
                            <div class="mb-3">
                                <p>Tipo de usuário:</p>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="admin" name="tipo_usuario" value="admin" required>
                                    <label class="form-check-label" for="admin">Administrador</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="aluno" name="tipo_usuario" value="aluno">
                                    <label class="form-check-label" for="aluno">Aluno</label>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Login</button>
                            </div>                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
