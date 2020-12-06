<?php
namespace Source\Model;
use CoffeeCode\DataLayer\DataLayer;

class User extends DataLayer 
{
    protected $entity = "usuarios";

  public function __construct()
  { 
    //contrutor do Datalayer

      // primeiro paramentro e o nome da entidade ou tabela no base de dados 
      // o segundo parametro e os campos obrigatorios 
    parent::__construct("usuarios",["NOME_COMPLETO","LOGIN","SENHA"],"USUARIO_ID",false);
          
  }

}