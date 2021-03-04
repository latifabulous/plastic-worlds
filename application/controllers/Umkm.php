<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Umkm extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{

		$data['umkm'] =  $this->db->get_where('umkm', ['username_umkm' => $this->session->userdata('username_umkm')])->row_array();

		$id =  $this->session->userdata('id_umkm');

		// $this->db->from('plastik');
		// $data['plastik'] = $this->db->count_all_results();
		$this->db->where('id_umkm', $id);
		$this->db->from('penukaran_plastik');
		$data['penukaran'] =  $this->db->count_all_results();
		$data['plastik'] =  $this->db->count_all('plastik');

		$data['judul'] = 'Dashboard';
		$this->load->view('templates/umkm_nav', $data);
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar', $data);
		$this->load->view('umkm/umkm-dashboard', $data);
		$this->load->view('templates/admin_footer');
	}

	public function Penukaran()
	{

		$data['judul'] = 'Data Penukaran';
		$data['umkm'] =  $this->db->get_where('umkm', ['username_umkm' => $this->session->userdata('username_umkm')])->row_array();
		$id =  $this->session->userdata('id_umkm');

		// $data['Penukaran'] =  $this->db->count_all('Penukaran');
		$data['penukaran'] =  $this->db->get_where('penukaran_plastik', ['id_umkm' => $id])->result_array();

		// $this->load->model('Home_model', 'home');
		// $data['penukaran'] =  $this->home->getMasyarakat();
		// $data['apa'] =  $this->home->getResult();
		// $data['Penukaran'] =  $this->db->get_where('Penukaran')->result_array();
		// $data['artikel'] =  $this->db->count_all('artikel');
		// $data['plastik'] =  $this->db->count_all('plastik');

		$this->load->view('templates/umkm_nav', $data);
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar', $data);
		$this->load->view('umkm/umkm-data-Penukaran', $data);
		$this->load->view('templates/admin_footer');
	}


	public function detailpenukaran($id)
	{

		$data['umkm'] =  $this->db->get_where('umkm', ['username_umkm' => $this->session->userdata('username_umkm')])->row_array();
		// $data['umkm'] =  $this->db->get('umkm')->result_array();
		$data['penukaran'] =  $this->db->get_where('penukaran_plastik', ['id' => $id])->row_array();
		$this->form_validation->set_rules('poin', 'Nama', 'required');

		$data['judul'] = 'Ubah Penukaran';
		$this->load->view('templates/umkm_nav', $data);
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar', $data);
		$this->load->view('umkm/umkm-ubah-penukaran', $data);
		$this->load->view('templates/admin_footer');
	}

	public function ubahPenukaran()
	{

		$data['umkm'] =  $this->db->get_where('umkm', ['username_umkm' => $this->session->userdata('username_umkm')])->row_array();
		// $data['umkm'] =  $this->db->get('umkm')->result_array();
		$id = $this->input->post('id', true);

		$data['penukaran'] =  $this->db->get_where('penukaran_plastik', ['id' => $id])->row_array();
		$this->form_validation->set_rules('poin', 'Nama', 'required');

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Ubah Penukaran';
			$this->load->view('templates/umkm_nav', $data);
			$this->load->view('templates/admin_header', $data);
			$this->load->view('templates/admin_sidebar', $data);
			$this->load->view('umkm/umkm-ubah-penukaran', $data);
			$this->load->view('templates/admin_footer');
		} else {

			$id = $this->input->post('id', true);
			$poin = $this->input->post('poin');
			$pet = $this->input->post('quantity1', true);
			$hdp = $this->input->post('quantity2', true);
			$pvc = $this->input->post('quantity3', true);
			$ldpe = $this->input->post('quantity4', true);
			$pp = $this->input->post('quantity5', true);
			$ps = $this->input->post('quantity6', true);
			$other = $this->input->post('quantity7', true);
			$status = $this->input->post('status', true);


			$this->db->set('total_poin', $poin);
			$this->db->set('pet', $pet);
			$this->db->set('hdp', $hdp);
			$this->db->set('pvc', $pvc);
			$this->db->set('ldpe', $ldpe);
			$this->db->set('pp', $pp);
			$this->db->set('ps', $ps);
			$this->db->set('pp', $pp);
			$this->db->set('other', $other);
			$this->db->set('status', $status);
			$this->db->where('id', $id);
			$this->db->update('penukaran_plastik');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di update!</div>');
			redirect('umkm/penukaran');
		}
	}
}