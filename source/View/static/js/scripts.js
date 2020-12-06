usuarios = [];
root = 'http://localhost/projetopadrao';
$(function() {
    buscarUsuarios();
    $("#btnEditarFunc").hide();
    $("#btnNovo").hide();

    $('#mensagem').fadeOut(6000);

});

function adicionarFuncionario() {
    event.preventDefault();
    jQuery.ajax({
        url: "adicionar_funcionario",
        type: "POST",
        data: $('#formFuncionario').serialize(),
        success: function(data) {
            if (data.situacao == 'success') {
                $('#formFuncionario input').val("");
                $('#success').show();
                $('#success').fadeOut(8000);
                location.reload();
            }
            if (data.situacao == 'errorFuncionario') {
                console.log(data);
                $('#errorFuncionario').show();
                $('#errorFuncionario').fadeOut(8000);
                location.reload();
            }

            if (data.situacao == 'inativo') {
                console.log(data);
                $('#inativo').show();
                $('#inativo').fadeOut(10000);
                location.reload();
            }

        }
    })

}

function editarfuncionario() {
    event.preventDefault();
    jQuery.ajax({
        url: "editar_funcionario",
        type: "POST",
        data: $('#formFuncionario').serialize(),
        success: function(data) {
            if (data.situacao == 'success') {
                $('#formFuncionario input').val("");
                $('#success').show();
                $('#success').fadeOut(8000);
                location.reload();
            }
            if (data.situacao == 'errorFuncionario') {
                $('#errorFuncionario').show();
            }

        }
    })

}

function verificarUsuario(id) {
    event.preventDefault();
    var id = id;
    jQuery.ajax({
        url: " verificar_usuario/ " + id,
        type: "GET",
        success: function(data) {
            if (data.idUsuario == null) {
                $("#nomefuncionario").val(data.funcionario);
                $("#idFuncionario").val(data.idFuncionario);
                $("#nomeUsuario").val('');
                $("#btnEditar").hide();
                $("#btnSalvar").show();
                $("#modalUsuario").modal('show');
                console.log(data);
            } else {
                $("#nomefuncionario").val(data.funcionario);
                $("#nomeUsuario").val(data.usuario);
                $("#idUsuario").val(data.idUsuario);
                $("#idFuncionario").val(data.idFuncionario);
                $("#btnEditar").show();
                $("#btnSalvar").hide();
                $("#modalUsuario").modal('show');
                console.log(data);
            }
        }
    })

}

function buscarUsuario() {
    jQuery.ajax({
        url: root + "/buscarUsuario",
        method: "GET",
        dataType: "JSON",
        success: function(data) {
            usuarios = data;
            console.log(data);
            // criarTabela();
        }
    })
}

function criarTabela() {
    const tBody = $('#Tabela');
    tBody.html('');

    funcionarioTr = '';
    funcionarios.forEach(funcionario => {
        funcionarioTr += `<tr>
                            <td>${funcionario.id}</td>
                            <td>${funcionario.nome}</td>
                            <td>${funcionario.cpf}</td>
                            <td>${funcionario.telefone}</td>
                            <td><button type="button" class="btn btn-primary" id="btnUsuario" onclick="verificarUsuario(${funcionario.id})">
                            Usuario </button>
                            </td>
                            <td>
                            <button type="button" class="btn btn-primary" id="btnUsuario" onclick="abrirFuncionario(${funcionario.id})">
                             Editar </button>
                            &nbsp; &nbsp; &nbsp;
                            <a onclick="return confirm('Deseja realmente inativar o Funcionario ?');" href="excluirFuncionario/${funcionario.id}" title="Inativar">
                            <i class="fa fa-times" title="Excluir"></i>
                            </a>
                            </td>
                            </tr>`;

    })
    tBody.html(funcionarioTr);
}

function abrirFuncionario(id) {
    jQuery.ajax({
        url: "funcionarios/" + id,
        type: "GET",
        success: function(data) {
            $("#nome").val(data.nome);
            $("#id").val(data.id);
            $("#cpf").val(data.cpf);
            $("#rg").val(data.rg);
            $("#telefone").val(data.telefone);
            $("#logradouro").val(data.logradouro);
            $("#numero").val(data.numero);
            $("#complemento").val(data.complemento);
            $("#cidade").val(data.cidade);
            $("#btnSalvarFunc").hide();
            $("#btnEditarFunc").show();
            $("#btnNovo").show();

        }
    })

}

function adicionarUsuario() {
    event.preventDefault();
    jQuery.ajax({
        url: "adicionar_usuario",
        type: "POST",
        data: $("#frmAdiconarUsuario").serialize(),
        success: function(data) {
            if (data.situacao == 'success') {
                $('#successUsuario').show();
                $('#successUsuario').fadeOut(6000);
                $("#modalUsuario").modal('hide');
                location.reload();
            }

        }
    })
}

function editarUsuario() {
    event.preventDefault();
    jQuery.ajax({
        url: "editar_usuario",
        type: "POST",
        data: $("#frmAdiconarUsuario").serialize(),
        success: function(data) {
            if (data.situacao == 'success') {
                $('#successUsuario').show();
                $('#successUsuario').fadeOut(6000);
                $("#modalUsuario").modal('hide');
                location.reload();
            }

        }
    })

}