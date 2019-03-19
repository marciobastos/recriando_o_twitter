<?php 
class posts extends model{

	public function inserirPost($msg){
		$id_usuario = $_SESSION['twlg'];

		$sql = "insert into posts set id_user = '$id_usuario', data_post = now(), mensagem = '$msg'";
		$this->db->query($sql);
	}
	public function getFeed($lista, $limite){
		$array = array();

		if(count($lista) > 0){
			// implode divide o array em strings separada pelo ponto ou virgula...
			$sql = "select *,(select nome from user where user.id = posts.id_user) as nome from posts where id_user in (".implode(',', $lista).") order by data_post desc LIMIT ".$limite;
			$sql = $this->db->query($sql);
			//echo $sql; exit;	
			if($sql->rowCount() > 0){
				$array = $sql->fetchAll();
			}

		}

		return $array;
	}
 }
?>