<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{

	public function getEvent()
	{
		$query = "SELECT `event`.*,  `komunitas`.`nama_komunitas`
							  FROM `event` JOIN `komunitas`
							    ON `event`.`id_komunitas` = `komunitas`.`id_komunitas`";

		return $this->db->query($query)->result_array();
	}

	public function getArtikel()
	{
		$query = "SELECT `artikel`.*,  `komunitas`.`nama_komunitas`
							  FROM `artikel` JOIN `komunitas`
							    ON `artikel`.`id_komunitas` = `komunitas`.`id_komunitas`";

		return $this->db->query($query)->result_array();
	}

	public function getArtikels()
	{
		$query = "SELECT `artikel`.*,  `komunitas`.`nama_komunitas`
							  FROM `artikel` JOIN `komunitas`
							    ON `artikel`.`id_komunitas` = `komunitas`.`id_komunitas`";

		return $this->db->query($query)->result_array();
	}

	public function getUmkm()
	{
		$query = "SELECT `penukaran_plastik`.*,  `umkm`.`nama_umkm`
							  FROM `penukaran_plastik` JOIN `umkm`
							    ON `penukaran_plastik`.`id_umkm` = `umkm`.`id_umkm`";

		return $this->db->query($query)->result_array();
	}

	public function getMasyarakat()
	{
		$query = "SELECT `penukaran_plastik`.*,  `masyarakat`.`nama_masyarakat`
							  FROM `penukaran_plastik` JOIN `masyarakat`
							    ON `penukaran_plastik`.`id_masyarakat` = `masyarakat`.`id_masyarakat`";

		return $this->db->query($query)->result_array();
	}

	public function getMasyarakats()
	{
		$query = "SELECT `join_event`.*,  `masyarakat`.`nama_masyarakat`, `email_masyarakat`
							  FROM `join_event` JOIN `masyarakat`
							    ON `join_event`.`id_masyarakat` = `masyarakat`.`id_masyarakat`";

		return $this->db->query($query)->result_array();
	}

	public function getMasyarakatr()
	{
		$query = "SELECT `penukaran_reward`.*,  `masyarakat`.`nama_masyarakat`, `email_masyarakat`
							  FROM `penukaran_reward` JOIN `masyarakat`
							    ON `penukaran_reward`.`id_masyarakat` = `masyarakat`.`id_masyarakat`";

		return $this->db->query($query)->result_array();
	}


	public function getResult()
	{

		$query = 'SELECT pvc, (pvc * 7) FROM penukaran_plastik';
		// $result = $this->db->query($query);

		return $this->db->query($query)->result_array();
	}

	public function getSum()
	{
		$query = 'SELECT SUM(total_poin) as poin FROM penukaran_plastik';
		$result = $this->db->query($query);
		return $result->row()->total_poin;
	}

	public function getReward()
	{
		foreach ($this->cart->contents() as $item) {
			$id = $this->session->userdata('id_masyarakat');
			$data = [
				'id_reward' => $item['id'],
				'id_masyarakat' => $id,
				'jumlah' => $item['qty'],
				'poin' => $item['price']
			];
			$this->db->insert('penukaran_reward', $data);
		}
		return TRUE;
	}
}