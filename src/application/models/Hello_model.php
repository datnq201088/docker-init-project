<?php
class Hello_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	public function getName() {
		var_dump($this->db);die;
	}	
}