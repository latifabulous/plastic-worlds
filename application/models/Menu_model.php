<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

	public function getSubmenu() {
		$query = "SELECT `user_submenu`.*,  `user_menu`.`nama_menu`
							  FROM `user_submenu` JOIN `user_menu`
							    ON `user_submenu`.`id_menu` = `user_menu`.`id_menu`";
							    
		return $this->db->query($query)->result_array();
	}
}