<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	//mwnggunaka helper buatan is_logged_in

	//digunakan untuk setiap method di class auth
	public function __construct()
	{
		//memanggil method construct pada CI_Controller
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->session->userdata('id_role')) {
			switch ($this->session->userdata('id_role')) {
				case 1:
					redirect('admin/');
					break;
				case 2:
					redirect('masyarakat/');
					break;
				case 3:
					redirect('komunitas/');
					break;
				case 4:
					redirect('umkm/');
					break;
				default:
					redirect('auth/');
					break;
			}
		}

		$this->form_validation->set_rules('uname', 'Username', 'required|trim');
		$this->form_validation->set_rules('pass', 'Password', 'required|trim');
		$this->form_validation->set_message('required', 'Wajib diisi.');


		if ($this->form_validation->run() == false) {

			$data['judul'] = 'Masuk';

			$this->load->view('templates/auth_header', $data);
			$this->load->view('templates/auth_nav');
			$this->load->view('auth/masuk');
			$this->load->view('templates/auth_footer');
		} else {
			//validasi berhasil
			//dibuat rivate agar hanya bisa diakses class ini saja, tidak bisa dengan url
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('uname');
		$password = md5($this->input->post('pass'));
		$roles = $this->input->post('role');

		// if($roles == 'masyarakat') {
		// 	$result = $this->db->get_where('masyarakat', ['username_' . $roles => $username])->row_array();
		// } else if ($roles == 'komunitas'){
		// 	$result = $this->db->get_where('komunitas', ['username_' . $roles => $username])->row_array();
		// } else if ($roles == 'umkm') {
		// 	$result = $this->db->get_where('umkm', ['username_' . $roles => $username])->row_array();
		// } else if ($roles == 'admin') {
		// 	$result = $this->db->get_where('admin', ['username_' . $roles => $username])->row_array();
		// } else {

		// }

		$result = $this->db->get_where('' . $roles, ['username_' . $roles => $username])->row_array();
		//jika usernya ada
		if ($result) {

			//jika user aktif
			//jika array user ada dan didalamnya ada field is_active
			if ($result['is_active_' . $roles] == 1) {

				//cek pass
				//pass, dari input sama ga sama
				// $user['pass'], data user
				// if(password_verify($password, $result['password_' . $roles])) {
				if ($password == $result['password_' . $roles]) {

					//siapin data ke session supaya bisa dipake di halaman user
					$data = [
						'username_' . $roles => $result['username_' . $roles],
						'id_role' => $result['id_role'], //menentukan menunya
						'id_' . $roles => $result['id_' . $roles] //menentukan menunya
					];

					//$data disimpan dalam session supaya bisa dipake dalam halaman user
					//data tidak disimpan semua yang dibutuhin hanya username dan role apa [user, admin]
					$this->session->set_userdata($data);

					switch ($result['id_role']) {
						case 1:
							redirect('admin/');
							break;
						case 2:
							redirect('masyarakat/');
							break;
						case 3:
							redirect('komunitas/');
							break;
						case 4:
							redirect('umkm/');
							break;
						default:
							redirect('auth/');
							break;
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password dan Username salah!</div>');
					// var_dump($password);
					// var_dump($result['password_admin']);
					redirect('Auth/');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun belum diaktivasi!</div>');
				redirect('Auth/');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak terdaftar!</div>');
			redirect('Auth/');
		}
	}

	public function daftar()
	{
		if ($this->session->userdata('id_role')) {
			switch ($this->session->userdata('id_role')) {
				case 1:
					redirect('admin/');
					break;
				case 2:
					redirect('masyarakat/');
					break;
				case 3:
					redirect('komunitas/');
					break;
				case 4:
					redirect('umkm/');
					break;
				default:
					redirect('auth/');
					break;
			}
		}
		//menggunakan form validasi
		//rules formv alidation

		//rulesnya nama dengan alias Nama harus required dan jika ada spasi di depan atau belakang tidak masuk ke database

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('uname', 'Username', 'required|trim|min_length[5]|max_length[12]|is_unique[masyarakat.username_masyarakat]', array('min_length' => '{field} harus memiliki {param} karakter.', 'is_unique' => 'Username sudah terdaftar.'));
		$this->form_validation->set_rules('notelp', 'Nomor Telephone', 'required|trim|integer');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[masyarakat.email_masyarakat]', array('is_unique' => 'Email sudah terdaftar.'));
		$this->form_validation->set_rules('pass', 'Password', 'required|trim|min_length[5]|matches[pass2]', array('min_length' => '{field} terlalu pendek'));
		$this->form_validation->set_rules('pass2', 'Pass Konfirmasi', 'required|trim|matches[pass]', array('matches' => 'Password tidak sama.'));

		$this->form_validation->set_message('required', 'Wajib diisi.');
		// $this->form_validation->set_message('is_unique', 'Username sudah terdaftar.');
		// $this->form_validation->set_message('matches', 'PASSWORD GA SAMA WOY ISI LAGI');

		// $this->form_validation->set_message('min_length', '{field} must have at least {param} characters.');

		//jika form validation gagal maka jalankan ini
		if ($this->form_validation->run() == false) {

			$data['judul'] = 'Daftar';

			$this->load->view('templates/auth_header', $data);
			$this->load->view('templates/auth_nav');
			$this->load->view('auth/daftar');
			$this->load->view('templates/auth_footer');
		} else {


			//true, menghindari cross side scriping
			$data = [
				'nama_masyarakat' => htmlspecialchars($this->input->post('nama', true)),
				'username_masyarakat' => htmlspecialchars($this->input->post('uname', true)),
				'email_masyarakat' => htmlspecialchars($this->input->post('email', true)),
				'gambar_masyarakat' => 'default.jpg',
				'alamat_masyarakat' => '',
				'nohp_masyarakat' => htmlspecialchars($this->input->post('notelp', true)),
				// 'password_masyarakat' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
				'password_masyarakat' => md5($this->input->post('pass')),
				'poin' => 0,
				'is_active_masyarakat' => 1,
				'date_created_masyarakat' => time(),
				'id_role' => 2
			];
			$this->db->insert('masyarakat', $data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat, berhasil daftar!</div>');
			redirect('auth/');
		}
	}


	public function keluar()
	{
		$this->session->unset_userdata('username_masyarakat');
		$this->session->unset_userdata('username_admin');
		$this->session->unset_userdata('username_komunitas');
		$this->session->unset_userdata('username_umkm');
		$this->session->unset_userdata('id_masyarakat');
		$this->session->unset_userdata('id_admin');
		$this->session->unset_userdata('id_komunitas');
		$this->session->unset_userdata('id_umkm');


		$this->session->unset_userdata('id_role');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil log out!</div>');
		redirect('auth/');
	}


	public function block()
	{
		$this->load->view('auth/block');
	}
}