// Gerar senha aleatoria
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

// Abrir e fechar modal
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

// Informações dentro do
$(document).ready(function() {
    $('.ver-mais').click(function() {
        let prato = $(this).data('prato');
        let nomePrato = $(this).data('nomeprato');
        let id = $(this).data('id');

        $.ajax({
            method: 'POST',
            url: '../backend/atualizar_refeicao_aluno.php',
            data: { id: id },
            success: function(response) {
                // Exibição no modal
                $('#modalItemId').val(id);
                $('#myModal .modal-body').html('<h5>Nome do prato: </h5> <p>' + nomePrato + '</p> <h5>Descrição: </h5> <p>' + prato + '</p>' + '<p>Quantidade de alunos: <span class="fw-bold">' + response);
            },
            error: function() {
                console.log('Erro ao obter a contagem de alunos.');
            }
        });
    });
});



$(document).ready(function() {
    $('.switch-aluno').on('change', function() {
        // Obtém o ID_aluno a partir do atributo data-id
        let idItem = $(this).data('id');
        let vaiComer = $(this).is(':checked') ? 1 : 0;

        $.ajax({
            method: 'POST',
            url: '../../projeto-cantina/backend/atualizar_refeicao_aluno.php',
            data: { ID_aluno: idItem, VaiComer: vaiComer },
            success: function(response) {
                console.log(response);

                if (vaiComer === 1) {
                    $('#switch-label' + idItem).text('Sim');
                } else {
                    $('#switch-label' + idItem).text('Não');
                }

                // Atualização no valor data-VaiComer do botão "Ver mais"
                $('.ver-mais[data-id="' + idItem + '"]').data('VaiComer', vaiComer);
            },
            error: function(xhr, status, error) {
                console.log('Erro ao atualizar o switch:', error);
            }
        });
    });
});



