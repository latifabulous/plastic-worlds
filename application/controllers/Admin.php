<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	//agar yg bisa akses admin hanyalah setelah login 

	public function __construct() {
		parent::__construct();

		is_logged_in();
	}

	public function index() {

		$data['admin'] =  $this->db->get_where('admin', ['username_admin' => $this->session->userdata('username_admin')])->row_array();
		$data['masyarakat'] =  $this->db->count_all('masyarakat');
		$data['komunitas'] =  $this->db->count_all('komunitas');
		$data['umkm'] =  $this->db->count_all('umkm');
		$data['plastik'] =  $this->db->count_all('plastik');
		// $data['plastik'] =  $this->db->count_all('plastik');

			$data['judul'] ='Dashboard';
			$this->load->view('templates/admin_nav', $data);
			$this->load->view('templates/admin_header', $data);
			$this->load->view('templates/admin_sidebar', $data);
			$this->load->view('admin/admin-dashboard', $data);
			$this->load->view('templates/admin_footer');		
	}

	public function role() {
		$data['judul'] ='Role';

		$data['admin'] =  $this->db->get_where('admin', ['username_admin' => $this->session->userdata('username_admin')])->row_array();
		$data['role']	= $this->db->get('user_role')->result_array();

		$this->load->view('templates/admin_nav', $data);
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar', $data);
		$this->load->view('admin/admin-role', $data);
		$this->load->view('templates/admin_footer');		
	}

	public function roleAccess($id_role) {
		$data['judul'] ='Role';

		$data['admin'] =  $this->db->get_where('admin', ['username_admin' => $this->session->userdata('username_admin')])->row_array();
		$data['role']	= $this->db->get_where('user_role', ['id_role' => $id_role])->row_array();
		$this->db->where('id_menu != 1');
		$data['menu']	= $this->db->get('user_menu')->result_array();
		
		$this->load->view('templates/admin_nav', $data);
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar', $data);
		$this->load->view('admin/admin-role-access', $data);
		$this->load->view('templates/admin_footer');		
	}


	public function changeAccess() {
		$id_menu = $this->input->post('idMenu');
		$id_role = $this->input->post('idRole');

		$data = [
			'id_role' => $id_role,
			'id_menu' => $id_menu,

		];

		$result = $this->db->get_where('user_accessmenu', $data);

		if ($result->num_rows() < 1) {
			$this->db->insert('user_accessmenu', $data);
		} else {
			$this->db->delete('user_accessmenu', $data);
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akses Diubah!</div>');
	}


	public function editProfile() {
		$data['judul'] ='Edit Profile';
		$data['admin'] =  $this->db->get_where('admin', ['username_admin' => $this->session->userdata('username_admin')])->row_array();

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');


		if ($this->form_validation->run() == false) {
			$this->load->view('templates/admin_nav', $data);
			$this->load->view('templates/admin_header', $data);
			$this->load->view('templates/admin_sidebar', $data);
			$this->load->view('admin/admin-edit-profile', $data);
			$this->load->view('templates/admin_footer');
		} else {		

			$uname = $this->input->post('uname');
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');

			//cek jika ada gambar

			$upload_gambar = $_FILES['gambar']['name'];
			// var_dump($upload_gambar);
			// die;

			if($upload_gambar) { //ada gambar yg diupload
				$config['upload_path'] = './assets/img/profile/';
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size']     = '2024';

				$this->load->library('upload', $config);

				//upload file
				if ($this->upload->do_upload('gambar')) {
					//gambar ganti semua hilang kecuali default
					$old_image = $data['admin']['gambar_admin'];
					if ($old_image != 'default.jpg') { //hapus gambar
						unlink(FCPATH . 'assets/img/profile/' . $old_image); //LETAK FILE (front controer) mengetahui path 
					}

					$new_image = $this->upload->data('file_name');

					$this->db->set('gambar_admin', $new_image);

				} else {
					 echo $this->upload->display_errors();
				}
			}

			$this->db->set('nama_admin', $nama);
			$this->db->set('email_admin', $email);
			$this->db->where('username_admin', $uname);
			$this->db->update('admin');


			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di update!</div>');
			redirect('admin/editProfile');
		}
	}


	public function gantipassadmin() {
		$data['judul'] ='Edit';

		$data['admin'] =  $this->db->get_where('admin', ['username_admin' => $this->session->userdata('username_admin')])->row_array();

		$this->form_validation->set_rules('pass', 'Password Sekarang', 'required|trim');
		$this->form_validation->set_rules('new-pass', 'Password Baru', 'required|trim|min_length[5]|matches[new-pass2]', array('min_length' => '{field} terlalu pendek'));
		$this->form_validation->set_rules('new-pass2', 'Konfirmasi Password', 'required|trim|matches[new-pass]', array('matches' => 'Password tidak sama.'));


		if ($this->form_validation->run() == false) {
			$this->load->view('templates/admin_nav', $data);
			$this->load->view('templates/admin_header', $data);
			$this->load->view('templates/admin_sidebar', $data);
			$this->load->view('admin/edit-edit-profile', $data);
			$this->load->view('templates/admin_footer');			
		}	else {
			$pass_sekarang = md5($this->input->post('pass'));
			$new_pass = md5($this->input->post('new-pass'));

			if($pass_sekarang != $data['admin']['password_admin']) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
				redirect('admin/editProfile');
			} else {
				if ($pass_sekarang == $new_pass) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password yang diganti tidak boleh sama dengan password sekarang!</div>');
				redirect('admin/editProfile');

				} else {
					$this->db->set('password_admin', $new_pass);
					$this->db->where('username_admin', $this->session->userdata('username_admin'));
					$this->db->update('admin');
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Password berhasil diubah!</div>');
				redirect('admin/editProfile');
					
				}
			}
		}
	}

	public function data_masyarakat() {

		$data['admin'] =  $this->db->get_where('admin', ['username_admin' => $this->session->userdata('username_admin')])->row_array();
		$data['masyarakat'] =  $this->db->get('masyarakat')->result_array();

		$data['judul'] ='Data Masyarakat';
		$this->load->view('templates/admin_nav', $data);
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar', $data);
		$this->load->view('admin/admin-data-masyarakat', $data);
		$this->load->view('templates/admin_footer');		
	}

	public function tambahMasy() {

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('uname', 'Username', 'required|trim|min_length[5]|max_length[12]|is_unique[masyarakat.username_masyarakat]', array('min_length' => '{field} harus memiliki {param} karakter.'));
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[masyarakat.email_masyarakat]');
		$this->form_validation->set_rules('pass', 'Password', 'required|trim|min_length[5]', array('min_length' => '{field} terlalu pendek'));

		$this->form_validation->set_message('required', 'Wajib diisi.');

		if ($this->form_validation->run() == false) {

			$data['judul'] ='Data Masyarakat';
			$this->load->view('templates/admin_nav', $data);
			$this->load->view('templates/admin_header', $data);
			$this->load->view('templates/admin_sidebar', $data);
			$this->load->view('admin/admin-data-masyarakat', $data);
			$this->load->view('templates/admin_footer');	

		} else {

			$data = [
				'nama_masyarakat' => htmlspecialchars($this->input->post('nama', true)),
				'username_masyarakat' => htmlspecialchars($this->input->post('uname', true)),
				'email_masyarakat' => htmlspecialchars($this->input->post('email', true)),
				'gambar_masyarakat' => 'default.jpg',
				'alamat_masyarakat' => '',
				'nohp_masyarakat' => '',
				'password_masyarakat' => md5($this->input->post('pass')),
				'is_active_masyarakat' => 1,
				'date_created_masyarakat' => time(),
				'id_role' => 2
			];	

			$this->db->insert('masyarakat', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambah!</div>');
			redirect('admin/data_masyarakat');
		}
	}

	public function hapusMasy($id) {

		$this->db->where('id_masyarakat', $id);
		$this->db->delete('masyarakat');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
			redirect('admin/data_masyarakat');
	}

	public function data_komunitas() {

		$data['admin'] =  $this->db->get_where('admin', ['username_admin' => $this->session->userdata('username_admin')])->row_array();
		$data['komunitas'] =  $this->db->get('komunitas')->result_array();

		$data['judul'] ='Data Komunitas';
		$this->load->view('templates/admin_nav', $data);
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar', $data);
		$this->load->view('admin/admin-data-komunitas', $data);
		$this->load->view('templates/admin_footer');		
	}

	public function tambahKom() {

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('pj', 'Penanggug Jawab', 'required|trim');
		$this->form_validation->set_rules('notelp', 'Nomor Telephone', 'required|trim|numeric');
		$this->form_validation->set_rules('uname', 'Username', 'required|trim|min_length[5]|max_length[12]|is_unique[komunitas.username_komunitas]', array('min_length' => '{field} harus memiliki {param} karakter.'));
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[komunitas.email_komunitas]');
		$this->form_validation->set_rules('pass', 'Password', 'required|trim|min_length[5]', array('min_length' => '{field} terlalu pendek'));

		$this->form_validation->set_message('required', 'Wajib diisi.');

		if ($this->form_validation->run() == false) {

			$data['judul'] ='Data komunitas';
			$this->load->view('templates/admin_nav', $data);
			$this->load->view('templates/admin_header', $data);
			$this->load->view('templates/admin_sidebar', $data);
			$this->load->view('admin/admin-data-komunitas', $data);
			$this->load->view('templates/admin_footer');	

		} else {
			
			$data = [
				'nama_komunitas' => htmlspecialchars($this->input->post('nama', true)),
				'username_komunitas' => htmlspecialchars($this->input->post('uname', true)),
				'email_komunitas' => htmlspecialchars($this->input->post('email', true)),
				'gambar_komunitas' => 'default.jpg',
				'alamat_komunitas' => '',
				'pj_komunitas' => htmlspecialchars($this->input->post('pj', true)),
				'desc_komunitas' => '',
				'nohp_komunitas' => htmlspecialchars($this->input->post('notelp', true)),
				'password_komunitas' => md5($this->input->post('pass')),
				'is_active_komunitas' => 1,
				'date_created_komunitas' => time(),
				'id_role' => 3
			];	

			$this->db->insert('komunitas', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambah!</div>');
			redirect('admin/data_komunitas');
		}
	}

	public function hapusKom($id) {

		$this->db->where('id_komunitas', $id);
		$this->db->delete('komunitas');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
			redirect('admin/data_komunitas');
	}

	public function detailKom($id) {

		$data['admin'] =  $this->db->get_where('admin', ['username_admin' => $this->session->userdata('username_admin')])->row_array();
		$data['kom'] =  $this->db->get_where('komunitas', ['id_komunitas' => $id])->row_array();

		$data['judul'] ='Data Komunitas';
		$this->load->view('templates/admin_nav', $data);
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar', $data);
		$this->load->view('admin/admin-rincian-komunitas', $data);
		$this->load->view('templates/admin_footer');		
	}


	public function data_umkm() {

		$data['admin'] =  $this->db->get_where('admin', ['username_admin' => $this->session->userdata('username_admin')])->row_array();
		$data['umkm'] =  $this->db->get('umkm')->result_array();

		$data['judul'] ='Data UMKM';
		$this->load->view('templates/admin_nav', $data);
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar', $data);
		$this->load->view('admin/admin-data-umkm', $data);
		$this->load->view('templates/admin_footer');		
	}

	public function tambahUmkm() {

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('pj', 'Penanggug Jawab', 'required|trim');
		$this->form_validation->set_rules('notelp', 'Nomor Telephone', 'required|trim|numeric');
		$this->form_validation->set_rules('uname', 'Username', 'required|trim|min_length[5]|max_length[12]|is_unique[umkm.username_umkm]', array('min_length' => '{field} harus memiliki {param} karakter.'));
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[umkm.email_umkm]');
		$this->form_validation->set_rules('pass', 'Password', 'required|trim|min_length[5]', array('min_length' => '{field} terlalu pendek'));

		$this->form_validation->set_message('required', 'Wajib diisi.');

		if ($this->form_validation->run() == false) {

			$data['judul'] ='Data umkm';
			$this->load->view('templates/admin_nav', $data);
			$this->load->view('templates/admin_header', $data);
			$this->load->view('templates/admin_sidebar', $data);
			$this->load->view('admin/admin-data-umkm', $data);
			$this->load->view('templates/admin_footer');	

		} else {
			
			$data = [
				'nama_umkm' => htmlspecialchars($this->input->post('nama', true)),
				'username_umkm' => htmlspecialchars($this->input->post('uname', true)),
				'email_umkm' => htmlspecialchars($this->input->post('email', true)),
				'gambar_umkm' => 'default.jpg',
				'alamat_umkm' => '',
				'pj_umkm' => htmlspecialchars($this->input->post('pj', true)),
				'desc_umkm' => '',
				'nohp_umkm' => htmlspecialchars($this->input->post('notelp', true)),
				'password_umkm' => md5($this->input->post('pass')),
				'is_active_umkm' => 1,
				'date_created_umkm' => time(),
				'id_role' => 4
			];	

			$this->db->insert('umkm', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambah!</div>');
			redirect('admin/data_umkm');
		}
	}

	public function hapusUMKM($id) {

		$this->db->where('id_umkm', $id);
		$this->db->delete('umkm');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
			redirect('admin/data_umkm');
	}

	public function detailUmkm($id) {

		$data['admin'] =  $this->db->get_where('admin', ['username_admin' => $this->session->userdata('username_admin')])->row_array();
		$data['umkm'] =  $this->db->get_where('umkm', ['id_umkm' => $id])->row_array();

		$data['judul'] ='Data UMKM';
		$this->load->view('templates/admin_nav', $data);
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar', $data);
		$this->load->view('admin/admin-rincian-umkm', $data);
		$this->load->view('templates/admin_footer');		
	}

	public function data_reward() {

		$data['admin'] =  $this->db->get_where('admin', ['username_admin' => $this->session->userdata('username_admin')])->row_array();
		$data['reward'] =  $this->db->get('reward')->result_array();

		$data['judul'] ='Data Reward';
		$this->load->view('templates/admin_nav', $data);
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar', $data);
		$this->load->view('admin/admin-data-reward', $data);
		$this->load->view('templates/admin_footer');		
	}

	public function tambahReward() {

		$data['admin'] =  $this->db->get_where('admin', ['username_admin' => $this->session->userdata('username_admin')])->row_array();
		$data['reward'] =  $this->db->get('reward')->result_array();

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('poin', 'Poin', 'required');
		$this->form_validation->set_rules('status', 'Nama', 'required');
		
		$this->form_validation->set_message('required', 'Wajib diisi.');

		if ($this->form_validation->run() == false) {

			$data['judul'] ='Data Reward';
			$this->load->view('templates/admin_nav', $data);
			$this->load->view('templates/admin_header', $data);
			$this->load->view('templates/admin_sidebar', $data);
			$this->load->view('admin/admin-data-reward', $data);
			$this->load->view('templates/admin_footer');	
		} else {
			// $id = $this->session->userdata('id_komunitas');
			$upload_gambar = $_FILES['gambar']['name'];
			

			$data = [
				'nama_reward' => htmlspecialchars($this->input->post('nama', true)),
				'jumlah_poin' => htmlspecialchars($this->input->post('poin', true)),
				'gambar_reward' => $upload_gambar,
				'is_active_reward' => htmlspecialchars($this->input->post('status', true))
			];	

			if($upload_gambar) { //ada gambar yg diupload
				$config['upload_path'] = './assets/img/reward/';
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size']     = '2024';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('gambar')) {
					$upload_gambar = $this->upload->data('file_name');
				} else {
					 echo $this->upload->display_errors();
				}
			}

			$this->db->insert('reward', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Event berhasil ditambah!</div>');
			redirect('admin/data_reward');
		}
	}


	public function hapusReward($id) {

		$this->db->where('id_reward', $id);
		$this->db->delete('reward');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
			redirect('admin/data_reward');
	}

	public function detailReward($id) {

		$data['admin'] =  $this->db->get_where('admin', ['username_admin' => $this->session->userdata('username_admin')])->row_array();
		$data['reward'] =  $this->db->get_where('reward', ['id_reward' => $id])->row_array();
		$data['penukaran'] =  $this->db->get_where('penukaran_reward', ['id_reward' => $id])->result_array();
		$this->load->model('Home_model', 'home');
		$data['penukaran'] =  $this->home->getMasyarakatr();

		$data['judul'] ='Data Reward';
		$this->load->view('templates/admin_nav', $data);
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar', $data);
		$this->load->view('admin/admin-rincian-reward', $data);
		$this->load->view('templates/admin_footer');		
	}

	public function getReward() {
		// echo 'ok';
		// echo json_encode($this->input->post('id'));
		$data['reward'] = $this->db->get('reward')->result_array();

		$id = $this->input->post('id');
		echo json_encode($this->db->get_where('reward', ['id_reward' => $id])->row_array());
	}

	public function editReward() {
		$data['judul'] ='Edit Reward';
		$data['admin'] =  $this->db->get_where('admin', ['username_admin' => $this->session->userdata('username_admin')])->row_array();

		$data['reward'] =  $this->db->get('reward')->result_array();
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('poin', 'Poin', 'required');
		$this->form_validation->set_rules('status', 'Nama', 'required');
		
		$this->form_validation->set_message('required', 'Wajib diisi.');

		if ($this->form_validation->run() == false) {

			$data['judul'] ='Data Reward';
			$this->load->view('templates/admin_nav', $data);
			$this->load->view('templates/admin_header', $data);
			$this->load->view('templates/admin_sidebar', $data);
			$this->load->view('admin/admin-data-reward', $data);
			$this->load->view('templates/admin_footer');	
		} else {

			$nama = $this->input->post('nama');
			$poin = $this->input->post('poin');
			$status = $this->input->post('status');
			$id = $this->input->post('id');


			$upload_gambar = $_FILES['gambar']['name'];

			if($upload_gambar) { //ada gambar yg diupload
				$config['upload_path'] = './assets/img/reward/';
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size']     = '2024';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('gambar')) {
					$upload_gambar = $this->upload->data('file_name');
				} else {
					 echo $this->upload->display_errors();
				}
			}

			$this->db->set('nama_reward', $nama);
			$this->db->set('jumlah_poin', $poin);
			$this->db->set('gambar_reward', $upload_gambar);
			$this->db->set('is_active_reward', $status);
			$this->db->where('id_reward', $id);
			$this->db->update('reward');


			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di update!</div>');
			redirect('admin/data_reward');
		}
	}
}