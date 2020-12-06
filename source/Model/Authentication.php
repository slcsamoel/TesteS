<?php
namespace Source\Model;
use CoffeeCode\DataLayer\DataLayer;

class Authentication extends DataLayer 
{
    protected $entity = "autorizacoes";

  public function __construct()
  { 
    //contrutor do Datalayer

      // primeiro paramentro e o nome da entidade ou tabela no base de dados 
      // o segundo parametro e os campos obrigatorios 
    parent::__construct("autorizacoes",["USUARIO_ID","CHAVE_AUTORIZACAO"]);
          
  }

  public function auth()
  {
    $this->statement = "SELECT * FROM vw_autorizacoes ";
    return $this;    

  }


}