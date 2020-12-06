<?php
require __DIR__."/vendor/autoload.php";

use CoffeeCode\Router\Router;

//estanciando o objeto rotas passando a url do projeto 
$rotas = new Router(ROOT);


$rotas->namespace('Source\Controller');

$rotas->group(null);
$rotas->get("/","UserController:home");
$rotas->post("/logar","UserController:authentication", "logar" );
$rotas->get("/buscarUsuario","UserController:dados");
$rotas->get("/filtrar/{name}","UserController:filtrar");
$rotas->get("/home","UserController:principal");
$rotas->get("/altera/{id}","UserController:altera");
$rotas->post("/altera/{id}/update","UserController:storeUpdate");
$rotas->get("/deletar/{id}","UserController:apagar");


$rotas->group('cadastrar');
$rotas->get("/","UserController:cadastrar");
$rotas->post("/store","UserController:store");





$rotas->dispatch();

if ($rotas->error()){
    $coderror = $rotas->error();
    echo '<h1 width="500" height="600" font-size="20"style="color:red; ">Error:'.$coderror.'</h1>';  
}
