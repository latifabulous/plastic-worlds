<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Plastik_model extends CI_Model
{
	public function getResult()
	{

		$query = 'SELECT pvc, (pvc * hdpe) FROM penukaran_plastik';
		// $result = $this->db->query($query);

		return $this->db->query($query)->result_array();
	}

	public function getUMKM()
	{
		$query = "SELECT `penukaran_plastik`.*,  `umkm`.`nama_umkm`
							  FROM `penukaran_plastik` JOIN `umkm`
							    ON `penukaran_plastik`.`id_umkm` = `umkm`.`id_umkm`";

		return $this->db->query($query)->row_array();
	}
}