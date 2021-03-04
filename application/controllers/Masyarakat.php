<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masyarakat extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// is_logged_in();
	}

	public function index()
	{

		$data['masyarakat'] =  $this->db->get_where('masyarakat', ['username_masyarakat' => $this->session->userdata('username_masyarakat')])->row_array();

		$data['judul'] = 'Profile';
		$id =  $this->session->userdata('id_masyarakat');
		$this->db->where('id_masyarakat', $id);
		$this->db->from('join_event');
		$data['join'] = $this->db->count_all_results();
		$this->db->where('id_masyarakat', $id);
		$this->db->from('penukaran_plastik');
		$data['tukar'] = $this->db->count_all_results();

		// $this->db->from('penukaran_plastik');
		// $this->db->select_sum('total_poin', 'jumlah');
		// $this->db->get();
		// $this->load->model('Home_model', 'home');
		// $data['poin'] =  $this->home->getSum();
		// $data['poin'] = $this->db->get_where('penukaran_plastik', ['id_masyarakat' => $this->session->userdata('id_masyarakat')])->row_array();

		$this->load->view('templates/auth_header', $data);
		$this->load->view('templates/masyarakat_nav', $data);
		$this->load->view('masyarakat/profile-masyarakat', $data);
		$this->load->view('templates/auth_footer');
	}

	public function edit()
	{
		$data['judul'] = 'Edit Profile';
		$data['masyarakat'] =  $this->db->get_where('masyarakat', ['username_masyarakat' => $this->session->userdata('username_masyarakat')])->row_array();

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		// $this->form_validation->set_rules('pass', 'Password Sekarang', 'required|trim');
		// $this->form_validation->set_rules('new-pass', 'Password Baru', 'required|trim|min_length[5]|matches[new-pass2]', array('min_length' => '{field} terlalu pendek'));
		// $this->form_validation->set_rules('new-pass2', 'Konfirmasi Password', 'required|trim|matches[new-pass]', array('matches' => 'PASSWORD GA SAMA WOY ISI LAGI'));


		if ($this->form_validation->run() == false) {
			$this->load->view('templates/auth_header', $data);
			$this->load->view('templates/masyarakat_nav', $data);
			$this->load->view('masyarakat/edit-profile-masyarakat', $data);
			$this->load->view('templates/auth_footer');
		} else {
			$uname = $this->input->post('uname');
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$nohp = $this->input->post('nohp');
			$alamat = $this->input->post('alamat');
			// $pass_sekarang = md5($this->input->post('pass'));
			// $new_pass = md5($this->input->post('new-pass'));



			// if($pass_sekarang != $data['masyarakat']['password_masyarakat']) {
			// 	$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
			// 	redirect('masyarakat/edit');
			// } else {
			// 	if ($pass_sekarang == $new_pass) {
			// 		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password yang diganti tidak boleh sama dengan password sekarang!</div>');
			// 	} else {
			// 		$this->db->set('password_masyarakat', $new_pass);
			// 		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data password sudah diganti!</div>');
			// 	}
			// }



			//cek jika ada gambar

			$upload_gambar = $_FILES['gambar']['name'];
			// var_dump($upload_gambar);
			// die;

			if ($upload_gambar) { //ada gambar yg diupload
				$config['upload_path'] = './assets/img/profile/';
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size']     = '2024';

				$this->load->library('upload', $config);

				//upload file
				if ($this->upload->do_upload('gambar')) {
					//gambar ganti semua hilang kecuali default
					$old_image = $data['masyarakat']['gambar_masyarakat'];
					if ($old_image != 'default.jpg') { //hapus gambar
						unlink(FCPATH . 'assets/img/profile/' . $old_image); //LETAK FILE (front controer) mengetahui path 
					}

					$new_image = $this->upload->data('file_name');

					$this->db->set('gambar_masyarakat', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('nama_masyarakat', $nama);
			$this->db->set('email_masyarakat', $email);
			$this->db->set('nohp_masyarakat', $nohp);
			$this->db->set('alamat_masyarakat', $alamat);
			$this->db->where('username_masyarakat', $uname);
			$this->db->update('masyarakat');

			// var_dump($pass_sekarang);
			// var_dump($new_pass);
			// var_dump($data['masyarakat']['password_masyarakat']);

			// die;

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di update!</div>');
			redirect('masyarakat/edit');
		}
	}


	public function gantiPass()
	{
		$data['judul'] = 'Edit Profile';

		$data['masyarakat'] =  $this->db->get_where('masyarakat', ['username_masyarakat' => $this->session->userdata('username_masyarakat')])->row_array();

		$this->form_validation->set_rules('pass', 'Password Sekarang', 'required|trim');
		$this->form_validation->set_rules('new-pass', 'Password Baru', 'required|trim|min_length[5]|matches[new-pass2]', array('min_length' => '{field} terlalu pendek'));
		$this->form_validation->set_rules('new-pass2', 'Konfirmasi Password', 'required|trim|matches[new-pass]', array('matches' => 'Password tidak sama!'));


		if ($this->form_validation->run() == false) {
			$this->load->view('templates/auth_header', $data);
			$this->load->view('templates/masyarakat_nav', $data);
			$this->load->view('masyarakat/edit-profile-masyarakat', $data);
			$this->load->view('templates/auth_footer');
		} else {
			$pass_sekarang = md5($this->input->post('pass'));
			$new_pass = md5($this->input->post('new-pass'));

			if ($pass_sekarang != $data['masyarakat']['password_masyarakat']) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
				redirect('masyarakat/edit');
			} else {
				if ($pass_sekarang == $new_pass) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password yang diganti tidak boleh sama dengan password sekarang!</div>');
					redirect('masyarakat/edit');
				} else {
					$this->db->set('password_masyarakat', $new_pass);
					$this->db->where('username_masyarakat', $this->session->userdata('username_masyarakat'));
					$this->db->update('masyarakat');
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Password berhasil diubah!</div>');
					redirect('masyarakat/edit');
				}
			}
		}
	}

	public function detailPenukaran()
	{

		$data['masyarakat'] =  $this->db->get_where('masyarakat', ['username_masyarakat' => $this->session->userdata('username_masyarakat')])->row_array();

		// $id =  $this->session->userdata('id_masyarakat');
		$data['penukaran'] =  $this->db->get_where('penukaran_plastik', ['id_masyarakat' => $this->session->userdata('id_masyarakat')])->result_array();

		$data['judul'] = 'Proses Penukaran';

		// $this->db->from('penukaran_plastik');
		// $this->db->select_sum('total_poin', 'jumlah');
		// $this->db->get();
		// $this->load->model('Home_model', 'home');
		// $data['poin'] =  $this->home->getSum();
		// $data['poin'] = $this->db->get_where('penukaran_plastik', ['id_masyarakat' => $this->session->userdata('id_masyarakat')])->row_array();

		$this->load->view('templates/auth_header', $data);
		$this->load->view('templates/masyarakat_nav', $data);
		$this->load->view('plastik/masyarakat-detail-penukaran', $data);
		$this->load->view('templates/auth_footer');
	}


	public function details($id)
	{

		$data['masyarakat'] =  $this->db->get_where('masyarakat', ['username_masyarakat' => $this->session->userdata('username_masyarakat')])->row_array();
		$data['judul'] = 'Proses Penukaran';
		$data['umkm'] =  $this->db->get('umkm')->result_array();
		$data['penukaran'] =  $this->db->get_where('penukaran_plastik', ['id' => $id])->row_array();
		$this->load->model('Plastik_model', 'plastik');
		$data['penukaran'] =  $this->plastik->getUMKM();
		$this->load->view('templates/auth_header', $data);
		$this->load->view('templates/masyarakat_nav', $data);
		$this->load->view('plastik/masyarakat-detail-plastik', $data);
		$this->load->view('templates/auth_footer');
	}
}