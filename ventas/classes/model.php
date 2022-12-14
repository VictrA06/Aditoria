<?php
	class Model{
		protected $db;
		public function __construct(){
			$this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			if($this->db->connect_errno){
				header('Location: '.BASE_URL.'templates/maintainance.php');
				exit();
			}
			$this->db->set_charset(DB_CHARSET);
		}
	}
?>