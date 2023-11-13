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

        $('#modalItemId').val(id);

        $('#myModal .modal-body').html('<h5>Nome do prato: </h5> <p>' + nomePrato + '</p> <h5>Descrição do prato: </h5> <p>' + prato + '</p>');
    });
});

$(document).ready(function() {
    $('.switch-aluno').on('change', function() {
        var idItem = $(this).data('id');
        var vaiComer = $(this).is(':checked') ? 1 : 0;
        
        $.ajax({
            method: 'POST',
            url: '../../projeto-cantina/backend/atualizar_refeicao_aluno.php',
            data: { idItem: idItem, vaiComer: vaiComer },
            success: function(response) {
                if (vaiComer === 1) {
                    $('#switch-label' + idItem).text('Sim');
                } else {
                    $('#switch-label' + idItem).text('Não');
                }
            },
            error: function() {
                console.log('Erro ao atualizar o switch.');
            }
        });
    });
});
