<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['judul'] = 'Beranda';


		$this->db->order_by('tanggal_event', 'ASC');
		$data['event'] =  $this->db->get('event', 3)->result_array();

		$this->load->model('Home_model', 'home');
		$data['event'] =  $this->home->getEvent();

		$this->db->order_by('date_created_artikel', 'ASC');
		// $this->db->limit(3);
		$data['artikel'] =  $this->db->get('artikel', 5, 7)->result_array();
		$this->load->model('Home_model', 'home');
		$data['artikel'] =  $this->home->getArtikel();
		$data['masyarakat'] =  $this->db->get_where('masyarakat', ['username_masyarakat' => $this->session->userdata('username_masyarakat')])->row_array();

		$this->db->from('masyarakat');
		$data['masyarakat'] = $this->db->count_all_results();
		$this->db->from('komunitas');
		$data['komunitas'] = $this->db->count_all_results();
		$this->db->from('umkm');
		$data['umkm'] = $this->db->count_all_results();
		$this->db->from('penukaran_plastik');
		$data['penukaran'] = $this->db->count_all_results();

		$this->load->view('templates/auth_header', $data);
		if ($this->session->userdata('username_masyarakat')) {
			$this->load->view('templates/masyarakat_nav', $data);
		} else {
			$this->load->view('templates/auth_nav', $data);
		}
		$this->load->view('home/index');
		$this->load->view('templates/auth_footer');
	}

	public function komunitas()
	{
		$data['judul'] = 'Komunitas';
		$data['masyarakat'] =  $this->db->get_where('masyarakat', ['username_masyarakat' => $this->session->userdata('username_masyarakat')])->row_array();

		$data['komunitas'] =  $this->db->get('komunitas')->result_array();

		$this->load->view('templates/umkm_header', $data);
		if ($this->session->userdata('username_masyarakat')) {
			$this->load->view('templates/masyarakat_nav', $data);
		} else {
			$this->load->view('templates/auth_nav', $data);
		}
		$this->load->view('home/komunitas', $data);
		$this->load->view('templates/umkm_footer');
	}

	public function profileKomunitas($id_komunitas)
	{
		$data['judul'] = 'Komunitas';

		$data['masyarakat'] =  $this->db->get_where('masyarakat', ['username_masyarakat' => $this->session->userdata('username_masyarakat')])->row_array();
		$data['komunitas'] =  $this->db->get_where('komunitas', ['id_komunitas' => $id_komunitas])->row_array();


		$this->load->view('templates/event_header', $data);
		if ($this->session->userdata('username_masyarakat')) {
			$this->load->view('templates/masyarakat_nav', $data);
		} else {
			$this->load->view('templates/auth_nav', $data);
		}
		$this->load->view('home/profile-komunitas', $data);
		$this->load->view('templates/auth_footer');
	}

	public function umkm()
	{
		$data['judul'] = 'UMKM';

		$data['masyarakat'] =  $this->db->get_where('masyarakat', ['username_masyarakat' => $this->session->userdata('username_masyarakat')])->row_array();
		$data['umkm'] =  $this->db->get('umkm')->result_array();

		$this->load->view('templates/umkm_header', $data);
		if ($this->session->userdata('username_masyarakat')) {
			$this->load->view('templates/masyarakat_nav', $data);
		} else {
			$this->load->view('templates/auth_nav', $data);
		}

		$this->load->view('home/umkm', $data);
		$this->load->view('templates/umkm_footer');
	}


	public function profileUmkm($id_umkm)
	{
		$data['judul'] = 'UMKM';

		$data['masyarakat'] =  $this->db->get_where('masyarakat', ['username_masyarakat' => $this->session->userdata('username_masyarakat')])->row_array();
		$data['umkm'] =  $this->db->get_where('umkm', ['id_umkm' => $id_umkm])->row_array();

		$this->load->view('templates/event_header', $data);
		if ($this->session->userdata('username_masyarakat')) {
			$this->load->view('templates/masyarakat_nav', $data);
		} else {
			$this->load->view('templates/auth_nav', $data);
		}
		$this->load->view('home/profile-umkm', $data);
		$this->load->view('templates/auth_footer');
	}

	public function event()
	{
		$data['judul'] = 'Event';
		$data['masyarakat'] =  $this->db->get_where('masyarakat', ['username_masyarakat' => $this->session->userdata('username_masyarakat')])->row_array();

		$this->db->order_by('tanggal_event', 'ASC');
		$data['event'] =  $this->db->get('event')->result_array();
		$this->load->model('Home_model', 'home');
		$data['event'] =  $this->home->getEvent();


		$this->load->view('templates/event_header', $data);
		if ($this->session->userdata('username_masyarakat')) {
			$this->load->view('templates/masyarakat_nav', $data);
		} else {
			$this->load->view('templates/auth_nav', $data);
		}

		$this->load->view('home/event', $data);
		$this->load->view('templates/auth_footer');
	}

	public function detailEvent($id_event)
	{

		$data['judul'] = 'Event';
		$data['masyarakat'] =  $this->db->get_where('masyarakat', ['username_masyarakat' => $this->session->userdata('username_masyarakat')])->row_array();

		$data['event'] =  $this->db->get_where('event', ['id_event' => $id_event])->row_array();

		$this->load->view('templates/event_header', $data);
		if ($this->session->userdata('username_masyarakat')) {
			$this->load->view('templates/masyarakat_nav', $data);
		} else {
			$this->load->view('templates/auth_nav', $data);
		}
		$this->load->view('home/rincian-event', $data);
		$this->load->view('templates/auth_footer');
	}
	public function ikutEvent()
	{
		// is_logged_in(); //fungsi helper

		$data['judul'] = 'Event';

		$id_event = $this->input->post('id_event');
		$id = $this->session->userdata('id_masyarakat');
		$data = [
			'id_event' => $id_event,
			'id_masyarakat' => $id,
			'seat' => 1
		];

		if ($id == null) {
			redirect('auth/');
		}

		$this->db->where('id_event', $id_event);
		$this->db->where('id_masyarakat', $id);
		$result = $this->db->get('join_event');

		if ($result->num_rows() > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda sudah terdaftar pada event!</div>');
			redirect('home/event/');
		} else {

			$this->db->insert('join_event', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat, berhasil terdaftar pada event!</div>');
			redirect('home/event/');
		}
	}

	public function detailArtikel($id_artikel)
	{
		$data['judul'] = 'Artikel';

		$data['masyarakat'] =  $this->db->get_where('masyarakat', ['username_masyarakat' => $this->session->userdata('username_masyarakat')])->row_array();
		$data['artikel'] =  $this->db->get_where('artikel', ['id_artikel' => $id_artikel])->row_array();

		$this->load->view('templates/event_header', $data);
		if ($this->session->userdata('username_masyarakat')) {
			$this->load->view('templates/masyarakat_nav', $data);
		} else {
			$this->load->view('templates/auth_nav', $data);
		}

		$this->load->view('home/rincian-artikel', $data);
		$this->load->view('templates/auth_footer');
	}

	public function artikel()
	{
		$data['judul'] = 'Artikel';

		$data['masyarakat'] =  $this->db->get_where('masyarakat', ['username_masyarakat' => $this->session->userdata('username_masyarakat')])->row_array();

		$this->db->order_by('date_created_artikel', 'ASC');
		$data['artikel'] =  $this->db->get('artikel')->result_array();

		$this->load->model('Home_model', 'home');
		$data['artikel'] =  $this->home->getArtikel();

		$data['masyarakat'] =  $this->db->get_where('masyarakat', ['username_masyarakat' => $this->session->userdata('username_masyarakat')])->row_array();


		$this->load->view('templates/event_header', $data);
		if ($this->session->userdata('username_masyarakat')) {
			$this->load->view('templates/masyarakat_nav', $data);
		} else {
			$this->load->view('templates/auth_nav', $data);
		}
		$this->load->view('home/artikel', $data);
		$this->load->view('templates/auth_footer');
	}

	public function cariArtikel()
	{
		$data['judul'] = 'Artikel';

		$data['masyarakat'] =  $this->db->get_where('masyarakat', ['username_masyarakat' => $this->session->userdata('username_masyarakat')])->row_array();

		// $data['artikel'] =  $this->db->get('artikel')->result_array();
		// $this->load->model('Home_model', 'home');
		// $data['artikel'] =  $this->home->getArtikel();

		$keyword = $this->input->post('keyword');
		$this->db->like('judul_artikel', $keyword);
		$data['artikel'] =  $this->db->get('artikel')->result_array();
		// $this->load->model('Home_model', 'home');
		// $data['artikel'] =  $this->home->getArtikels();

		// $this->load->model('Home_model', 'home');
		// $data['artikel'] =  $this->home->getArtikel();


		$this->load->view('templates/event_header', $data);
		if ($this->session->userdata('username_masyarakat')) {
			$this->load->view('templates/masyarakat_nav', $data);
		} else {
			$this->load->view('templates/auth_nav', $data);
		}
		$this->load->view('home/artikel', $data);
		$this->load->view('templates/auth_footer');

		// if($this->input->post('cari')){
		// 	echo$data['keyword'] = $this->input->post('keyword');
		// }
	}

	public function tentang()
	{
		$data['judul'] = 'Tentang Kami';
		$data['masyarakat'] =  $this->db->get_where('masyarakat', ['username_masyarakat' => $this->session->userdata('username_masyarakat')])->row_array();

		$this->db->order_by('id_admin', 'DESC');
		$data['admin'] =  $this->db->get('admin', 3)->result_array();


		$this->load->view('templates/auth_header', $data);
		if ($this->session->userdata('username_masyarakat')) {
			$this->load->view('templates/masyarakat_nav', $data);
		} else {
			$this->load->view('templates/auth_nav', $data);
		}
		$this->load->view('home/about-us', $data);
		$this->load->view('templates/umkm_footer');
	}
}