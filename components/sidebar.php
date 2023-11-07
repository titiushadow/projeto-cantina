<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar position-fixed">
    <div class="logo">
        <a href="/projeto-cantina/telas/tela-admin.php">
            <img src="../img/logo.png" alt="">
        </a>
    </div>
    <div class="position-sticky">
        <ul class="nav flex-column gap-3 mx-3">
            <li class="nav-item">
                <button class="btn btn-primary btn-sidebar" type="button" data-bs-toggle="collapse" data-bs-target="#alunos">
                    <i class="bx bxs-user"></i> Alunos
                </button>
                <div class="collapse" id="alunos">
                    <ul class="nav flex-column mx-3">
                        <li class="nav-item">
                            <a class="nav-link" href="../Cadastros/Cad-alunos.php"><i class="bx bx-user-plus"></i> Cadastrar Alunos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Listagem/Listagem-alunos.php"><i class="bx bx-list-ul"></i> Lista de Alunos</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <button class="btn btn-primary btn-sidebar" type="button" data-bs-toggle="collapse" data-bs-target="#cardapio">
                    <i class="bx bx-food-menu"></i> Cardápio
                </button>
                <div class="collapse" id="cardapio">
                <ul class="nav flex-column mx-3">
                        <li class="nav-item">
                            <a class="nav-link" href="../Cadastros/Cad-cardapio.php"><i class="bx bx-plus"></i> Cadastrar Cardápio</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <button class="btn btn-primary btn-sidebar" type="button" data-bs-toggle="collapse" data-bs-target="#sugestoes">
                    <i class='bx bx-list-ul'></i> Sugestões
                </button>
                <div class="collapse" id="sugestoes">
                <ul class="nav flex-column mx-3">
                        <li class="nav-item">
                            <a class="nav-link" href="../Listagem/Listagem-sugestoes.php"><i class='bx bx-list-check'></i> Lista de sugestões</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item d-flex fixed-bottom mx-1">
                <a class="nav-link" href="/projeto-cantina/index.php">
                    <button class="btn btn-danger btn-sair"><i class="bx bx-log-out"></i> Sair</button>
                </a>
            </li>
        </ul>
    </div>
</nav>