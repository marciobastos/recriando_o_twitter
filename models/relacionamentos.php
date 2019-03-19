<?php 
class relacionamentos extends model{

	public function seguir($seguidor, $seguido){

		$sql ="insert into relationship set id_follower = '$seguidor', id_followed = '$seguido'";
		$this->db->query($sql);
	}
	public function deseguir($seguidor, $seguido){

		$sql ="delete from relationship where id_follower = '$seguidor' and id_followed = '$seguido'";
		$this->db->query($sql);
	}
}



 ?>