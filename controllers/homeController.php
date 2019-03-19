<?php
class homeController extends Controller {

    public function __construct(){
    	parent::__construct();
        global $db;
        //print_r($db);
        //exit;
    	$u = new usuarios();

    	if(!$u->isLogged()){
    		header("Location:/phpDoZero/php_2019/recriando_o_twitter/login");
    	}
    }
    public function index() {
        $data = array(
        	'nome' => ''
        );
        $p = new posts();
        if(isset($_POST['msg']) && !empty($_POST['msg'])){

            $msg = addslashes($_POST['msg']);
            $p->inserirPost($msg);
        }

        $u = new usuarios($_SESSION['twlg']);
        $data['nome']= $u->getNome();
        $data['qt_seguidos']= $u->countSeguidos();
        $data['qt_seguidores']= $u->countSeguidores();
        $data['sugestao'] = $u->getUsuarios(5);

        $lista = $u->getSeguidos();
        $lista[] = $_SESSION['twlg'];
        //pega todos os usuarios que está seguindo;
        $data['feed'] = $p->getFeed($lista, 10);

        $this->loadTemplate('home', $data);
        //home está dentro de homeController que estende Controller
        //então  loadViewInTemplate() fica acessível dentro de home;
        //
    }
    public function seguir($id){

    	if(!empty($id)){
    		$id = addslashes($id);
    		$sql = "select * from user where id = '$id'";
    		$res = $this->db->query($sql);
    		
    		if($res->rowCount() > 0){

    			$r = new relacionamentos();
    			$r->seguir($_SESSION['twlg'], $id);
                //echo $_SESSION['twlg'];
                //exit;
    		}
    	}
    	header("Location: /phpDoZero/php_2019/recriando_o_twitter");
    }
    public function deseguir($id){

    	if(!empty($id)){
    		$id = addslashes($id);

    		$sql = "select * from user where id = '$id'";
    		$sql = $this->db->query($sql);

    		if($sql->rowCount() > 0){

    			$r = new relacionamentos();
    			$r->deseguir($_SESSION['twlg'], $id);
    		}
    	}
    	header("Location: /phpDoZero/php_2019/recriando_o_twitter");
    }

}







