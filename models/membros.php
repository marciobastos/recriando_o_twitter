<?php 
class membros extends model{

	public function getFeedUser($id, $limite){
			$array = array();
		$sql = "select *,(select nome from user where user.id = '".$id."') as nome from posts where id_user = '".$id."' order by data_post desc LIMIT ".$limite;
			$sql = $this->db->query($sql);
			//echo $sql; exit;	
			if($sql->rowCount() > 0){
				$array = $sql->fetchAll();
			}

			return $array;
		}

	}


 ?>