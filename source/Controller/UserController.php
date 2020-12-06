<?php
namespace Source\Controller;

use CoffeeCode\DataLayer\DataLayer;
use League\Plates\Engine;
use Source\Model\User;
use Source\Model\Authentication;

class UserController extends DataLayer
{
    private $view;
    public function __construct()
    {
        // informando a pastas aonde fica as view e o tipo de arquivos da pasta 
        /* ao fazer uma requisição de uma view ele armazena na variavel e retorna 
        no metodos */
        $this->view = Engine::create(__DIR__."./../View","php");     
    }

    public function home()
    {
       
        echo $this->view->render("index");
      
    }

    public function error($data)
    {
            echo "<h1> Erro {$data['coderror']}</h1>";
            var_dump($data);

    }

        public function authentication($data)
        {
            $model = new User();
            $user = $model->find("LOGIN = :LOGIN AND SENHA = :SENHA", "LOGIN=".$data['login']."&SENHA=".$data['senha'])->fetch();

            if(isset($user->USUARIO_ID))
            {

                if($user->ATIVO == 'S'){

                    $_SESSION['user'] = $user->LOGIN ;
                    $_SESSION['id'] = $user->USUARIO_ID;
                    echo $this->view->render("pesquisa_usuarios");

                }else{

                    echo $this->view->render("index",['error' => 'Usuario esta Inativo']);

                }

            }
            else{

            echo $this->view->render("index",['error' => 'Usuario Não Existe']);

            } 

        }

            public function dados()
            {
                $model = new User();
                $users = $model->find()->fetch(true);

                    foreach ($users as $index => $user){
                        $usuarios[$index]['usuario_id'] = $user->USUARIO_ID ? $user->USUARIO_ID:'';
                        $usuarios[$index]['login'] = $user->LOGIN ? $user->LOGIN : '';
                        $usuarios[$index]['nome_completo'] = $user->NOME_COMPLETO ? $user->NOME_COMPLETO : '';
                        $usuarios[$index]['ativo'] = $user->ATIVO ? $user->ATIVO : '';
                    }
            
                    header('Content-Type: application/json');
                    echo json_encode($usuarios);

            }

            public function filtrar($data)
            {
                $model = new User();
                $users = $model->find("NOME_COMPLETO like :NOME_COMPLETO", "NOME_COMPLETO like %".$data['name']."%")->fetch();

                    foreach ($users as $index => $user){
                        $usuarios[$index]['usuario_id'] = $user->USUARIO_ID ? $user->USUARIO_ID:'';
                        $usuarios[$index]['login'] = $user->LOGIN ? $user->LOGIN : '';
                        $usuarios[$index]['nome_completo'] = $user->NOME_COMPLETO ? $user->NOME_COMPLETO : '';
                        $usuarios[$index]['ativo'] = $user->ATIVO ? $user->ATIVO : '';
                    }
            
                    header('Content-Type: application/json');
                    echo json_encode($usuarios);
            }
            public function cadastrar()
            {
                    echo $this->view->render("cadastro_usuarios");        

            }

            public function store($data)
            {
                $model = new User();
                $user = $model->find("LOGIN=:LOGIN" , "LOGIN=".$data['login'])->fetch();
                
                if(!isset($user)){
                    
                  $user = new User();  
                   //var_dump($user);
                  $user->NOME_COMPLETO = $data['nome_completo'];
                  $user->LOGIN = $data['login'];
                  $user->SENHA = $data['senha'];
                  $user->ATIVO = $data['ativo'];
                  $usuarioID = $user->save(); 

                 // var_dump($model);
                  
                  if(!empty($usuarioID))
                  {
                    return $this->principal();
                  }else{

                    echo $this->view->render("cadastro_usuarios",[
                        'message' => $user->fail()->getMessage()]);
                  } 

                 }else{

                    echo $this->view->render("cadastro_usuarios",[
                        'message' => "Usuario Já existe "
                    ]);       

                }

            }

            public function principal()
            {
                echo $this->view->render("pesquisa_usuarios");

            }

            public function altera($data)
            {
                $id = intval($data['id']);    

                $usuario = (new User())->findById($id);

                echo $this->view->render("cadastro_usuarios",[
                    'usuario'=> $usuario 
                ]); 

            }

            public function storeUpdate($data)
            {
                $id = intval($data['id']);

                $usuario = (new User())->findById($id);
                $usuario->NOME_COMPLETO = $data['nome_completo']?$data['nome_completo']:$usuario->NOME_COMPLETO;
                $usuario->LOGIN = $data['login']?$data['login']:$usuario->LOGIN;
                $usuario->SENHA = $data['senha']?$data['senha']:$usuario->SENHA;
                $usuario->ATIVO = $data['ativo']?$data['ativo']:$usuario->ATIVO;

                $usuarioID = $usuario->save(); 
                return $this->principal();

            }


             public function apagar($data) 
            {
                $id = intval($data['id']);
                $usuario = (new User())->findById($id);
                $usuario->destroy();
                return $this->principal();
            }
}