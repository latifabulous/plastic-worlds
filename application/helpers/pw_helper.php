<?php 

function is_logged_in() {

	//instansiasi CI 
	$ci = get_instance(); //memanggil library CI di dalam fungsi

	//cek udah login apa belum
	//kalo udah login cek rolenya apa
	//kenapa ci bukan this?
	//mengambil fitur session pada objek CI karena ci itu objek dr instansiasi ke CI
	if (!$ci->session->userdata('id_role')) { //kalo gaada data user pada session
		redirect('auth');
	} else {
		//agar jika menjadi user tidak boleh akses admin 
		//kalo udah log in cek dia itu siapa
		//dapet role id ddari session
		$id_role = $ci->session->userdata('id_role');
		//lagi di menu mana
		//cek dia mau akses menu keberapa
		//segmen 1 adalah controller
		$menu = $ci->uri->segment(1);

		//query tabel menu berdasarkan id_menu
		$queryMenu = $ci->db->get_where('user_menu', ['nama_menu' => $menu])->row_array();

		$id_menu = $queryMenu['id_menu'];

		$userAccess = $ci->db->get_where('user_accessmenu', [
			'id_role' => $id_role, 
			'id_menu' => $id_menu
		]);

		//cek jika ada, memang ada barisnya
		if ($userAccess -> num_rows() < 1 ) {
				redirect('auth/block');
		}

	}
}


function check_access($id_role, $id_menu) {
	$ci = get_instance();

	$ci->db->where('id_role', $id_role);
	$ci->db->where('id_menu', $id_menu);
	$result = $ci->db->get('user_accessmenu');

	// $ci->db->get_where('user_accessmenu', [
	// 	'id_role' => $id_role, 
	// 	'id_menu' => $id_menu
	// ]);

	if ($result->num_rows() > 0) {
		return "checked='checked'";
	}  


}















?>