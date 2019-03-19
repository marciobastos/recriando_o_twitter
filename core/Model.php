<?php
class Model {
	
	protected $db;

	public function __construct() {
		global $config;
		global $db;
		$this->db = $db;
	}

}
?>