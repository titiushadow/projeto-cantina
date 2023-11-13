function gerarSenha() {
    let senhaInput = document.getElementById('senha');
    let senha = gerarSenhaAleatoria();
    senhaInput.value = senha;
}

function gerarSenhaAleatoria() {
    let caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    let senha = "";
    for (let i = 0; i < 8; i++) {
        senha += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
    }
    return senha;
}

$(document).ready(function() {
    $(document).on('click', '.ver-mais', function() {
        let title = $(this).data('title');
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
        let prato = $(this).data('prato');
        let nomePrato = $(this).data('nomeprato');
        let id = $(this).data('id');

        $('#modalItemId').val(id);

        $('#myModal .modal-body').html('<h5>Nome do prato: </h5> <p>' + nomePrato + '</p> <h5>Descrição do prato: </h5> <p>' + prato + '</p>');
    });
});

$(document).ready(function() {
    $('.switch-aluno').on('change', function() {
        let idItem = $(this).data('id');
        let vaiComer = $(this).is(':checked') ? 1 : 0;

        $.ajax({
            method: 'POST',
            url: '../../projeto-cantina/backend/atualizar_refeicao_aluno.php',
            data: { id: idItem, VaiComer: vaiComer },
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
