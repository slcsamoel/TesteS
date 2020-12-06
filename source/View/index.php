<?php 

use CoffeeCode\Router\Router;

$rotas = new Router(ROOT);

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>santri</title>

    <link rel="stylesheet" href="<?= url('/source/View/static/css/w3.css')?>">
    <link rel="stylesheet" href="<?= url('/source/View/static/css/santri.css')?>">
    <link rel="stylesheet" href="<?= url('/source/View/static/css/toastr.css')?>">


    <link rel="stylesheet" href="<?= url('/source/View/static/css-awesome/brands.css')?>">
    <link rel="stylesheet" href="<?= url('/source/View/static/css-awesome/fontawesome.css')?>">
    <link rel="stylesheet" href="<?= url('/source/View/static/css-awesome/regular.css')?>">
    <link rel="stylesheet" href="<?= url('/source/View/static/css-awesome/solid.css')?>">
    <link rel="stylesheet" href="<?= url('/source/View/static/css-awesome/svg-with-js.css') ?>">
    <link rel="stylesheet" href="<?= url('/source/View/static/css-awesome/v4-shims.css')?>">

    <style>
      #login {
        max-width: 95%;
        margin: auto;
        width: 380px;
        margin-top: 5%;
      }

      #logo-cliente {
        max-width: 100%;
        margin: auto;
        width: 700px;    
      }

      #logo-santri {
        max-width: 50%;
        margin: auto;
        width: 380px;    
      }
    </style>

  </head>
  <body>
  
    <script src="<?= url('/source/View/static/js/jquery.js') ?>"></script>

    <div id="login">
    <?php  
        if(isset($error)):      
      ?>
      <h3><?= $error ?></h3>
      <?php 
        endif; 
      ?> 
     <form action="<?= url('logar')?>" method="POST">   
      <img id="logo-cliente" class="w3-margin-top" src="<?= url('/source/View/static/imagens/logo_cliente.jpg') ?>"/>
      <input type="hidden" name="_method" value="POST">
      <input class="w3-input w3-border w3-margin-top" name="login" type="text" placeholder="Usuário" required>
      <input class="w3-input w3-border w3-margin-top" name="senha" type="password" placeholder="Senha" required>
      <button class="w3-button w3-theme w3-margin-top w3-block">Logar</button>
      
      </form>
      <a href="http://www.santri.com.br">
        <img id="logo-santri" class="w3-right w3-margin-top" src="<?= url('/source/View/static/imagens/logo_santri.svg')?>"/>
      </a>
    </div>
    
  </body>
</html>