<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Plastik extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// is_logged_in();
		$this->load->library('upload');
	}

	public function index()
	{

		$data['admin'] =  $this->db->get_where('admin', ['username_admin' => $this->session->userdata('username_admin')])->row_array();
		$data['umkm'] =  $this->db->get_where('umkm', ['username_umkm' => $this->session->userdata('username_umkm')])->row_array();
		$data['plastik'] =  $this->db->get('plastik')->result_array();

		$data['judul'] = 'Data Plastik';

		if ($this->session->userdata('username_admin')) {
			$this->load->view('templates/admin_nav', $data);
		} else {
			$this->load->view('templates/umkm_nav', $data);
		}
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar', $data);
		$this->load->view('plastik/index', $data);
		$this->load->view('templates/admin_footer');
	}


	public function penukaran()
	{
		$data['judul'] = 'Plastik';

		$data['masyarakat'] =  $this->db->get_where('masyarakat', ['username_masyarakat' => $this->session->userdata('username_masyarakat')])->row_array();
		$data['plastik'] =  $this->db->get('plastik')->result_array();
		$data['umkm'] =  $this->db->get('umkm')->result_array();

		$this->form_validation->set_rules('id_umkm', 'Id_umkm', 'required');


		$this->form_validation->set_message('required', 'Wajib diisi.');


		$id = $this->session->userdata('id_masyarakat');
		$data = [
			'id_umkm' => $this->input->post('id_umkm'),
			'id_masyarakat' => $id,
			'total_poin' => '220',
			'pet' => $this->input->post('quantity1', true),
			'hdp' => $this->input->post('quantity2', true),
			'pvc' => $this->input->post('quantity3', true),
			'ldpe' => $this->input->post('quantity4', true),
			'pp' => $this->input->post('quantity5', true),
			'ps' => $this->input->post('quantity6', true),
			'other' => $this->input->post('quantity7', true),
			'tanggal_tukar' => date('Y-m-d H:i:s'),
			'batas_tukar' => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 3, date('Y'))),
			'status' => 0
		];

		$this->db->insert('penukaran_plastik', $data);
		redirect('masyarakat/detailPenukaran');
	}

	public function detail($id_plastik)
	{
		$data['judul'] = 'Plastik';

		$data['masyarakat'] =  $this->db->get_where('masyarakat', ['username_masyarakat' => $this->session->userdata('username_masyarakat')])->row_array();
		$data['plastik'] =  $this->db->get_where('plastik', ['id_plastik' => $id_plastik])->row_array();


		$this->load->view('templates/auth_header', $data);
		$this->load->view('templates/masyarakat_nav', $data);
		$this->load->view('plastik/detail-plastik', $data);
		$this->load->view('templates/auth_footer');
	}

	public function hapusPlastik($id_plastik)
	{

		$this->db->where('id_plastik', $id_plastik);
		$this->db->delete('plastik');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
		redirect('plastik');
	}

	public function tambahPlastik()
	{

		$data['admin'] =  $this->db->get_where('admin', ['username_admin' => $this->session->userdata('username_admin')])->row_array();
		$data['umkm'] =  $this->db->get_where('umkm', ['username_umkm' => $this->session->userdata('username_umkm')])->row_array();

		$this->form_validation->set_rules('jenis', 'Jenis plastik', 'required|trim');
		$this->form_validation->set_rules('contents', 'Detail plastik', 'required');
		$this->form_validation->set_rules('desc', 'Deskripsi', 'required');

		if ($this->form_validation->run() == false) {

			$data['judul'] = 'Tambah plastik';
			if ($this->session->userdata('username_admin')) {
				$this->load->view('templates/admin_nav', $data);
			} else {
				$this->load->view('templates/umkm_nav', $data);
			}
			$this->load->view('templates/artikel_header', $data);
			$this->load->view('templates/admin_sidebar', $data);
			$this->load->view('plastik/tambah-plastik', $data);
			$this->load->view('templates/plastik_footer');
		} else {
			$upload_gambar = $_FILES['gambar']['name'];
			$jenis = $this->input->post('jenis', TRUE);
			$poin = $this->input->post('poin', TRUE);
			$desc = $this->input->post('desc', TRUE);
			$contents = $this->input->post('contents', TRUE);

			$data = [
				'gambar_plastik' => $upload_gambar,
				'jenis_plastik' => $jenis,
				'desc_plastik' => $desc,
				'detail_plastik' => $contents,
				'poin' => $poin,
			];

			if ($upload_gambar) { //ada gambar yg diupload
				$config['upload_path'] = './assets/img/plastik/';
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size']     = '2024';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('gambar')) {
					$upload_gambar = $this->upload->data('file_name');
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->insert('plastik', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data plastik berhasil ditambah!</div>');
			redirect('plastik');
		}
	}

	//Upload image summernote
	public function upload_image()
	{
		if (isset($_FILES["image"]["name"])) {
			$config['upload_path'] = './assets/img/plastik/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('image')) {
				$this->upload->display_errors();
				return FALSE;
			} else {
				$data = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/img/plastik/' . $data['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['quality'] = '60%';
				$config['width'] = 800;
				$config['height'] = 800;
				$config['new_image'] = './assets/img/plastik/' . $data['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				echo base_url() . 'assets/img/plastik/' . $data['file_name'];
			}
		}
	}

	//Delete image summernote
	public function delete_image()
	{
		$src = $this->input->post('src');
		$file_name = str_replace(base_url(), '', $src);
		if (unlink($file_name)) {
			echo 'File Delete Successfully';
		}
	}

	public function tukarPlastik()
	{
		$data['masyarakat'] =  $this->db->get_where('masyarakat', ['username_masyarakat' => $this->session->userdata('username_masyarakat')])->row_array();
		$data['umkm'] =  $this->db->get('umkm')->result_array();
		$data['plastik'] =  $this->db->get('plastik')->result_array();

		$data['judul'] = 'Tukar Plastik';

		$this->load->view('templates/auth_header', $data);
		$this->load->view('templates/masyarakat_nav', $data);
		$this->load->view('plastik/tukar-plastik', $data);
		$this->load->view('templates/auth_footer');
	}
}