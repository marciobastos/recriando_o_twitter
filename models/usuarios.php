<?php 
class usuarios extends model{
 	
 	private $uid;
 	public function __construct($id = ''){
 		parent::__construct();
 		if(!empty($id)){
 			$this->uid = $id;
 		}
 	}
 	public function isLogged(){

 		if(isset($_SESSION['twlg']) && !empty($_SESSION['twlg'])){
 			return true;
 		}else{
 			return false;
 		}
 		}
 	public function usuarioExiste($email){

 		$sql = "select * from user where email = '$email'";
 		$sql = $this->db->query($sql);

 		if($sql->rowCount() > 0){

 			return true;
 		}else{
 			return false;
 		}
 	}
 	public function inserirUsuario($nome, $email, $senha){

 		$sql = "insert into user set nome = '$nome', email = '$email', senha = '$senha'";
 		$this->db->query($sql);

 		$id = $this->db->lastInsertId();
 		return $id;
 	}
 	public function fazerLogin($email, $senha){

 		$sql = "select * from user where email = '$email' and senha = '$senha'";
 		
 		//echo $sql;exit;
 		$sql = $this->db->query($sql);

 		if($sql->rowCount() > 0){
 			$sql = $sql->fetch();
 			$_SESSION['twlg'] = $sql['id'];
 			return true;
 		}else{
 			return false;
 		}
 	}
 	public function getNome(){
 		if(!empty($this->uid)){

 			$sql = "select nome from user where id = '".($this->uid)."'";
 			$sql = $this->db->query($sql);

 			if($sql->rowCount() > 0){
 				$sql = $sql->fetch();

 				return $sql['nome'];
 			}
 		}
 	}
 	public function countSeguidos(){
 		$sql = "select * from relationship where id_follower = '".($this->uid)."'";
 		$sql = $this->db->query($sql);

 		return $sql->rowCount();
 	}
 	public function countSeguidores(){
 		$sql = "select * from relationship where id_followed = '".($this->uid)."'";
 		$sql = $this->db->query($sql);

 		return $sql->rowCount();
 	}
 	public function getUsuarios($limite){
 		$array = array();

 		$sql = "select 
 		*,
 		(select count(*) from relationship where relationship.id_follower = '".($this->uid)."' and relationship.id_followed = user.id) as seguidos 
 		from user where id !='".($this->uid)."'limit $limite";
 		$sql = $this->db->query($sql);

 		if($sql->rowCount() > 0 ){
 			$array = $sql->fetchAll();
 		}
 		return $array;
 	}
 	public function getSeguidos() {
		$array = array();

		$sql = "SELECT id_followed FROM relationship WHERE id_follower = '".($this->uid)."'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
			foreach($sql as $seg) {
				$array[] = $seg['id_followed'];
			}
		}

		return $array;
	}
}
?>
