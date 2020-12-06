<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title>santri</title>

  <link rel="stylesheet" href="<?= url('/source/View/static/css/w3.css')?>">
  <link rel="stylesheet" href="<?=url ('/source/View/static/css/santri.css')?>">
  <link rel="stylesheet" href="<?= url('/source/View/static/css/toastr.css')?>">
  

  <link rel="stylesheet" href="<?= url('/source/View/static/css-awesome/brands.css')?>">
  <link rel="stylesheet" href="<?= url('/source/View/static/css-awesome/fontawesome.css')?>">
  <link rel="stylesheet" href="<?= url('/source/View/static/css-awesome/regular.css')?>">
  <link rel="stylesheet" href="<?= url('/source/View/static/css-awesome/solid.css')?>">
  <link rel="stylesheet" href="<?= url('/source/View/static/css-awesome/svg-with-js.css')?>">
  <link rel="stylesheet" href="<?= url('/source/View/static/css-awesome/v4-shims.css')?>">

</head>

<body>
  <script src="<?= url('/source/View/static/js/jquery.js')?>"></script>
  <div>
    <div id="lista_usuarios" class="w3-margin">

     <?php  
        if(isset($usuario)):      
      ?>
      <h4>Atualizar usuário</h4>
      <form action="<?= url('altera/')?><?= $usuario->USUARIO_ID ?>/update" id="form" method="POST">
      <?php 
        else: 
      ?> 
      <h4>Cadastro de usuários</h4>
      <form action="<?= url('cadastrar/store')?>" id="form" method="POST">
      <?php 
        endif; 
      ?> 
      <div>
      <?php  
        if(isset($usuario)):      
      ?>
     <label>Usuario:<?= $usuario->USUARIO_ID?></label>
      <?php 
        endif; 
      ?> 
      </div>
      <div>
        <label>Nome</label>
        <input type="text" name="nome_completo"
        <?php  
          if(isset($usuario)):      
         ?>
        value="<?= $usuario->NOME_COMPLETO ?>"
        <?php 
          endif; 
         ?> 
        class="w3-input w3-block w3-border">
      </div>

      <div>
        <label>Login</label>
        <input type="text" name="login" 
        <?php  
           if(isset($usuario)):      
         ?>
         value="<?= $usuario->LOGIN ?>"
         <?php  
           endif; 
         ?> 
        class="w3-input w3-block w3-border">
      </div>

      <div>
        <label>Senha</label>
        <input type="text" name="senha"
         class="w3-input w3-block w3-border">
      </div>

      <div>
        <label>Ativo</label>
        <input type="text" name="ativo"
        <?php  
           if(isset($usuario)):      
         ?>
         value="<?= $usuario->ATIVO ?>"
         <?php  
           endif; 
         ?> 
         class="w3-input w3-block w3-border">
      </div>
      <ul>
        <li id="opt_cadastrar_clientes"><input type="checkbox" checked value="cadastrar_clientes"> <label>Cadastrar clientes</label></li>
        <li id="opt_excluir_clientes"><input type="checkbox" value="excluir_clientes"> <label>Excluir clientes</label></li>
        <li id="opt_mais"><input type="checkbox" value="mais"> <label>E assim sucessivamente</label></li>
      </ul>    
      <button class="w3-button w3-theme w3-margin-top w3-margin-bottom">Gravar</button>
      <a href="<?= url('home')?>" class="w3-button w3-margin-top w3-margin-bottom w3-right">Cancelar</a>
      </form>
    </div>
  </div>
  <script>

  </script>
</body>
</html>