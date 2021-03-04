<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komunitas extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		// if (!$this->session->userdata('id_role')) {//kalo gaada data user pada session
		// 	redirect('auth');
		// }

		is_logged_in();
	}

	public function index()
	{

		$data['komunitas'] =  $this->db->get_where('komunitas', ['username_komunitas' => $this->session->userdata('username_komunitas')])->row_array();
		// $data['event'] =  $this->db->get_where('event', ['id_komunitas' => $this->session->userdata('id_komunitas')])->result_array();
		$id =  $this->session->userdata('id_komunitas');
		// $queryEvent = "SELECT COUNT('nama_event') FROM `event` WHERE `id_komunitas` = $id"; 
		// $data['event'] =  $this->db->query($queryEvent)->row_array();
		// $data['event'] =  $this->db->where('id_komunitas', $this->session->userdata('id_komunitas'));
		// $menu = $this->db->query($queryMenu)->result_array();

		// $data['event'] =  $this->db->count_all('event', ['id_komunitas' => $this->session->userdata('id_komunitas')] );
		$this->db->where('id_komunitas', $id);
		$this->db->from('event');
		$data['event'] = $this->db->count_all_results();

		$this->db->where('id_komunitas', $id);
		$this->db->from('artikel');
		$data['artikel'] = $this->db->count_all_results();

		$data['judul'] = 'Dashboard';
		$this->load->view('templates/komunitas_nav', $data);
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar', $data);
		$this->load->view('komunitas/komunitas-dashboard', $data);
		$this->load->view('templates/admin_footer');
	}

	public function event()
	{

		$data['komunitas'] =  $this->db->get_where('komunitas', ['username_komunitas' => $this->session->userdata('username_komunitas')])->row_array();
		// $data['event'] =  $this->db->count_all('event');
		$data['event'] =  $this->db->get_where('event', ['id_komunitas' => $this->session->userdata('id_komunitas')])->result_array();
		// $this->load->model('Home_model', 'home');
		// $data['event'] =  $this->home->getEvent();
		// $data['event'] =  $this->db->get_where('event')->result_array();
		// $data['artikel'] =  $this->db->count_all('artikel');
		// $data['plastik'] =  $this->db->count_all('plastik');

		$data['judul'] = 'Data Event';
		$this->load->view('templates/komunitas_nav', $data);
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar', $data);
		$this->load->view('komunitas/komunitas-data-event', $data);
		$this->load->view('templates/admin_footer');
	}

	public function detailEvent($id)
	{
		$data['judul'] = 'Data Event';
		$data['komunitas'] =  $this->db->get_where('komunitas', ['username_komunitas' => $this->session->userdata('username_komunitas')])->row_array();
		// $data['event'] =  $this->db->count_all('event');
		$data['event'] =  $this->db->get_where('event', ['id_event' => $id])->row_array();
		$data['join'] =  $this->db->get_where('join_event', ['id_event' => $id])->result_array();
		$this->load->model('Home_model', 'home');
		$data['join'] =  $this->home->getMasyarakats();

		$this->load->view('templates/komunitas_nav', $data);
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar', $data);
		$this->load->view('komunitas/komunitas-rincian-event', $data);
		$this->load->view('templates/admin_footer');
	}

	public function tambahEvent()
	{

		$data['komunitas'] =  $this->db->get_where('komunitas', ['username_komunitas' => $this->session->userdata('username_komunitas')])->row_array();

		$this->form_validation->set_rules('event', 'Nama Event', 'required|trim');
		$this->form_validation->set_rules('tanggal', 'Tanggal Event', 'required');
		$this->form_validation->set_rules('waktu', 'Waktu Event', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Event', 'required|max_length[140]');


		$this->form_validation->set_message('required', 'Wajib diisi.');

		if ($this->form_validation->run() == false) {

			$data['judul'] = 'Tambah Event';
			$this->load->view('templates/komunitas_nav', $data);
			$this->load->view('templates/admin_header', $data);
			$this->load->view('templates/admin_sidebar', $data);
			$this->load->view('komunitas/komunitas-tambah-event', $data);
			$this->load->view('templates/admin_footer');
		} else {
			$id = $this->session->userdata('id_komunitas');
			$upload_gambar = $_FILES['gambar']['name'];
			$data = [
				'nama_event' => htmlspecialchars($this->input->post('event', true)),
				'gambar_event' => $upload_gambar,
				'tanggal_event' => htmlspecialchars($this->input->post('tanggal', true)),
				'tempat_event' => htmlspecialchars($this->input->post('tempat', true)),
				'waktu_event' => htmlspecialchars($this->input->post('waktu', true)),
				'kuota' => htmlspecialchars($this->input->post('kuota', true)),
				'desc_event' => htmlspecialchars($this->input->post('deskripsi', true)),
				'id_komunitas' => $id
			];


			if ($upload_gambar) { //ada gambar yg diupload
				$config['upload_path'] = './assets/img/event/';
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size']     = '2024';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('gambar')) {
					$upload_gambar = $this->upload->data('file_name');
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->insert('event', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Event berhasil ditambah!</div>');
			redirect('komunitas/event');
		}
	}


	public function hapusEvent($id_event)
	{

		$this->db->where('id_event', $id_event);
		$this->db->delete('event');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Event berhasil dihapus!</div>');
		redirect('komunitas/event');
	}

	public function artikel()
	{

		$data['komunitas'] =  $this->db->get_where('komunitas', ['username_komunitas' => $this->session->userdata('username_komunitas')])->row_array();
		// $data['artikel'] =  $this->db->count_all('artikel');
		$data['artikel'] =  $this->db->get_where('artikel', ['id_komunitas' => $this->session->userdata('id_komunitas')])->result_array();
		// $this->load->model('Home_model', 'home');
		// $data['artikel'] =  $this->home->getartikel();

		$data['judul'] = 'Data Artikel';
		$this->load->view('templates/komunitas_nav', $data);
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar', $data);
		$this->load->view('komunitas/komunitas-data-artikel', $data);
		$this->load->view('templates/admin_footer');
	}

	public function editProfile()
	{
		$data['judul'] = 'Edit Profile';
		$data['komunitas'] =  $this->db->get_where('komunitas', ['username_komunitas' => $this->session->userdata('username_komunitas')])->row_array();

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_message('required', 'Wajib diisi.');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/komunitas_nav', $data);
			$this->load->view('templates/admin_header', $data);
			$this->load->view('templates/admin_sidebar', $data);
			$this->load->view('komunitas/komunitas-edit-profile', $data);
			$this->load->view('templates/admin_footer');
		} else {
			$uname = $this->input->post('uname');
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$nohp = $this->input->post('nohp');
			$alamat = $this->input->post('alamat');
			$desc = $this->input->post('desc');

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
					$old_image = $data['komunitas']['gambar_komunitas'];
					if ($old_image != 'default.jpg') { //hapus gambar
						unlink(FCPATH . 'assets/img/profile/' . $old_image); //LETAK FILE (front controer) mengetahui path 
					}

					$new_image = $this->upload->data('file_name');

					$this->db->set('gambar_komunitas', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('nama_komunitas', $nama);
			$this->db->set('email_komunitas', $email);
			$this->db->set('nohp_komunitas', $nohp);
			$this->db->set('alamat_komunitas', $alamat);
			$this->db->set('desc_komunitas', $desc);
			$this->db->where('username_komunitas', $uname);
			$this->db->update('komunitas');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di update!</div>');
			redirect('komunitas/editProfile');
		}
	}


	public function gantiPass()
	{
		$data['judul'] = 'Edit Profile';

		$data['komunitas'] =  $this->db->get_where('komunitas', ['username_komunitas' => $this->session->userdata('username_komunitas')])->row_array();

		$this->form_validation->set_rules('pass', 'Password Sekarang', 'required|trim');
		$this->form_validation->set_rules('new-pass', 'Password Baru', 'required|trim|min_length[5]|matches[new-pass2]', array('min_length' => '{field} terlalu pendek'));
		$this->form_validation->set_rules('new-pass2', 'Konfirmasi Password', 'required|trim|matches[new-pass]', array('matches' => 'Password tidak sama'));


		if ($this->form_validation->run() == false) {
			$this->load->view('templates/komunitas_nav', $data);
			$this->load->view('templates/admin_header', $data);
			$this->load->view('templates/admin_sidebar', $data);
			$this->load->view('komunitas/komunitas-edit-profile', $data);
			$this->load->view('templates/admin_footer');
		} else {
			$pass_sekarang = md5($this->input->post('pass'));
			$new_pass = md5($this->input->post('new-pass'));

			if ($pass_sekarang != $data['komunitas']['password_komunitas']) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
				redirect('komunitas/editProfile');
			} else {
				if ($pass_sekarang == $new_pass) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password yang diganti tidak boleh sama dengan password sekarang!</div>');
					redirect('komunitas/editProfile');
				} else {
					$this->db->set('password_komunitas', $new_pass);
					$this->db->where('username_komunitas', $this->session->userdata('username_komunitas'));
					$this->db->update('komunitas');
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Password berhasi diubah!</div>');
					redirect('komunitas/editProfile');
				}
			}
		}
	}



















	// public function tambahArtikel(){

	// 	$data['komunitas'] =  $this->db->get_where('komunitas', ['username_komunitas' => $this->session->userdata('username_komunitas')])->row_array();

	// 	$this->form_validation->set_rules('artikel', 'Judul artikel', 'required|trim');
	// 	$this->form_validation->set_rules('isi', 'Isi artikel', 'required');


	// 	$this->form_validation->set_message('required', 'ISI WOY');

	// 	if ($this->form_validation->run() == false) {

	// 		$data['judul'] ='Tambah Artikel';
	// 		$this->load->view('templates/komunitas_nav', $data);
	// 		$this->load->view('templates/artikel_header', $data);
	// 		$this->load->view('templates/admin_sidebar', $data);
	// 		$this->load->view('komunitas/komunitas-tambah-artikel', $data);
	// 		$this->load->view('templates/admin_footer');	
	// 	} else {
	// 		$id = $this->session->userdata('id_komunitas');
	// 		$upload_gambar = $_FILES['gambar']['name'];
	// 		$data = [
	// 			'judul_artikel' => htmlspecialchars($this->input->post('artikel', true)),
	// 			'gambar_artikel' => $upload_gambar,
	// 			'date_created_artikel' => date(),
	// 			'isi_artikel' => htmlspecialchars($this->input->post('isi', true)),
	// 			'id_komunitas' => $id
	// 		];	


	// 		if($upload_gambar) { //ada gambar yg diupload
	// 			$config['upload_path'] = './assets/img/artikel/';
	// 			$config['allowed_types'] = 'jpeg|jpg|png';
	// 			$config['max_size']     = '2024';

	// 			$this->load->library('upload', $config);

	// 			if ($this->upload->do_upload('gambar')) {
	// 				$upload_gambar = $this->upload->data('file_name');
	// 			} else {
	// 				 echo $this->upload->display_errors();
	// 			}
	// 		}

	// 		$this->db->insert('artikel', $data);
	// 		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data artikel berhasil ditambah!</div>');
	// 		redirect('komunitas/artikel');
	// 	}
	// }
}