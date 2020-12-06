<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>santri</title>

    <link rel="stylesheet" href="<?= url('/source/View/static/css/w3.css') ?>">
    <link rel="stylesheet" href="<?= url('/source/View/static/css/santri.css') ?>">
    <link rel="stylesheet" href="<?= url('/source/View/static/css/toastr.css') ?>">
    <link rel="stylesheet" href="<?= url('/source/View/static/css-awesome/brands.css')?>">
    <link rel="stylesheet" href="<?= url('/source/View/static/css-awesome/fontawesome.css')?>">
    <link rel="stylesheet" href="<?= url('/source/View/static/css-awesome/regular.css')?>">
    <link rel="stylesheet" href="<?= url('/source/View/static/css-awesome/solid.css')?>">
    <link rel="stylesheet" href="<?= url('/source/View/static/css-awesome/svg-with-js.css')?>">
    <link rel="stylesheet" href="<?= url('/source/View/static/css-awesome/v4-shims.css')?>">
    <script src="<?= url('/source/View/static/js/jquery.js')?>"></script>
    <style>
      table {
        border-collapse: collapse;
        width: 100%;
      }

      th, td {
        text-align: left;
        padding: 8px;
        border-bottom: 1px solid #ddd;
      }

      tr:nth-child(even) {background-color: #f2f2f2;}
    </style>

  </head>
  <body>
    <div>
      <div id="lista_usuarios" class="w3-margin">

        <input class="w3-input w3-border w3-margin-top" id="buscar" type="text" placeholder="Nome">
        <button class="w3-button w3-theme w3-margin-top" onclick="pesquisa();" >Buscar</button>
        <a href="<?= url('cadastrar/') ?>" class="w3-button w3-theme w3-margin-top w3-right">Cadastrar novo usuário</a>

        <table>
          <thead>
            <tr>
              <th>Nome</td>
              <th>Login</td>
              <th>Ativo</td>
              <th>Opções</td>  
            </tr>
          </thead>
          <tbody id="Tabela">
            
          </tbody>
        </table>
      </div>
    </div>    
    <script>
    var usuarios = [];
    var root = 'http://localhost/projetopadrao';
    $(document).ready(function () {
      buscarUsuarios();
    });
    function buscarUsuarios() {
        $.ajax({
          url: root + "/buscarUsuario",
          method: "GET",
          dataType: "JSON",
          success: function(data) {
              usuarios = data;
              //console.log(data);
               criarTabela(usuarios);
          }
        })
     }
    function criarTabela(usuarios) {
          const tBody = $('#Tabela');
          tBody.html('');

          usuariosTr = '';
          usuarios.forEach(usuario => {
            usuariosTr += `<tr>
                                  <td>${usuario.nome_completo}</td>
                                  <td>${usuario.login}</td>
                                  <td>${usuario.ativo}</td>
                                  <td>
                                    <a href="<?= url('deletar')?>/${usuario.usuario_id}" class="w3-button w3-theme w3-margin-top"><i class="fas fa-user-times"></i></button>
                                    <a href="<?= url('altera')?>/${usuario.usuario_id}" class="w3-button w3-theme w3-margin-top"><i class="fas fa-edit"></i></button>
                                  </td>
                                  </tr>`;

              });
          tBody.html(usuariosTr);
    }

     function pesquisa(){
        let name =  $('#buscar').val();
        $.ajax({
          url: root + "/filtrar/"+name,
          method: "GET",
          dataType: "JSON",
          success: function(data) {
              usuarios = data;
              console.log(data);
               criarTabela(usuarios);
          }
        })
     }


     function alterTabela(user){
      const tBody = $('#Tabela');
          tBody.html('');

          usuarioTr = '';
            usuarioTr += `<tr>
                                  <td>${user.nome_completo}</td>
                                  <td>${user.login}</td>
                                  <td>${user.ativo}</td>
                                  <td>
                                    <button class="w3-button w3-theme w3-margin-top"><i class="fas fa-user-times"></i></button>
                                    <button class="w3-button w3-theme w3-margin-top"><i class="fas fa-edit"></i></button>
                                  </td>
                                  </tr>`;

          tBody.html(usuarioTr);
     }
    </script> 
  </body>
</html>