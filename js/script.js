// Script para gerar numero de ficha aleatoriamente
function gerarSenha() {
    var senhaInput = document.getElementById('senha');
    var senha = gerarSenhaAleatoria();
    senhaInput.value = senha;
}

function gerarSenhaAleatoria() {
    var caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    var senha = "";
    for (var i = 0; i < 8; i++) {
        senha += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
    }
    return senha;
}

// Abrir modal para (Atualizar cardapio ou excluir)
$(document).ready(function() {
    $(document).on('click', '.ver-mais', function() {
        var title = $(this).data('title');
        $('#modalTitle').text(title);

        $('#myModal').modal('show');
    });

    $('#myModal .close').on('click', function() {
        $('#myModal').modal('hide');
    });

    $('#myModal .btn-success').on('click', function() {
        $('#myModal').modal('hide');
    });
});

$(document).ready(function() {
    $('.ver-mais').click(function() {
        var prato = $(this).data('prato');
        var nomePrato = $(this).data('nomeprato');
        var id = $(this).data('id');

        // Atualize o campo de entrada oculta com o ID
        $('#modalItemId').val(id);

        $('#myModal .modal-body').html('<h5>Nome do prato: </h5> <p>' + nomePrato + '</p> <h5>Descrição do prato: </h5> <p>' + prato + '</p>');
    });
});

$(document).ready(function() {
    $('.switch-aluno').change(function() {
        const idItem = $(this).data('id');
        const ativo = $(this).prop('checked'); // Verifica se o switch está ativo (true) ou desativado (false)
        const nome = 'Nome do Aluno'; // Substitua pelo nome do aluno

        // Envie os dados para o servidor usando AJAX para atualizar a tabela "refeicaoAlunos"
        $.ajax({
            url: 'atualizar_refeicao_aluno.php',
            method: 'POST',
            data: { idItem, ativo, nome },
            success: function(response) {
                // Atualize a informação na tela do administrador em tempo real aqui, se necessário
            }
        });
    });
});
