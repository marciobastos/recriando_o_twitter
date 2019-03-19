<?php 
class membroController extends Controller{

	public function __construct(){
		parent::__construct();
		global $db;
	}
	public function index(){
		$array = array('nome' => '');

		$posts = new posts();
		

		$u = new usuarios($_SESSION['twlg']);
		$array['nome'] = $u->getNome();
		
		//print_r($array); exit;
		$this->loadTemplate('membro', $array);


	}
	public function exibirPerfil($id){
		$data = array('nome' => '');

		$m = new membros();
		$u = new usuarios($_SESSION['twlg']);

		$data['nome'] = $u->getNome();
		//$lista = $u->getSeguidos();
		$data['feed'] = $m->getFeedUser($id, 10);
		
		$this->loadTemplate('membro', $data);
	}

}


 ?>