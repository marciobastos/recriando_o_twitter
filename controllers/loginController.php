<?php
class loginController extends Controller {

    public function __construct(){
    	parent::__construct();

    }
    public function index() {
        $data = array();

        if(isset($_POST['email']) && !empty($_POST['email'])){
            $email = addslashes($_POST['email']);
            $senha = md5($_POST['pwd']);

            $u = new usuarios();

            if($u->fazerLogin($email, $senha)){
                header("Location: /phpDoZero/php_2019/recriando_o_twitter");
            }
        }
        $this->loadView('login', $data);
    }
    public function cadastro(){
        $data = array('aviso' => '');

        if(isset($_POST['name']) && !empty($_POST['name'])){

            $nome = addslashes($_POST['name']);
            $email = addslashes($_POST['email']);
            $senha = md5($_POST['pwd']);

            if(!empty($nome) && !empty($email) && !empty($senha)){

                $u = new usuarios();

                if(!$u->usuarioExiste($email)){
                    $_SESSION['twlg'] = $u->inserirUsuario($nome, $email, $senha);
                    header("Location: /phpDoZero/php_2019/recriando_o_twitter");

                }else{
                    $data['aviso']= "Este usuário já existe!";
                }

            }else{
                $data['aviso'] = "Preencha todos os campos.";
            }

        }
        $this->loadView('cadastro', $data);
    }
    public function sair(){
        unset($_SESSION['twlg']);
        header("Location:/phpDoZero/php_2019/recriando_o_twitter/login");
    }
}