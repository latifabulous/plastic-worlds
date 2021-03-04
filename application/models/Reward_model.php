<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reward_model extends CI_Model {

	public function find($id) {
	
		$result = $this->db->where('id_reward', $id )->limit(1)->get('reward');
		if ($result ->num_rows() > 0) {
				return $result->row();
		} else {
			return array();
		}
	}
}