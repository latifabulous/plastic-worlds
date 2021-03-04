<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct() {
		parent::__construct();
		is_logged_in(); //fungsi helper
	}

	public function index() {

		$data['judul'] ='Menu Management';
		$data['admin'] =  $this->db->get_where('admin', ['username_admin' => $this->session->userdata('username_admin')])->row_array();
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('menu', 'Nama Menu', 'required');

		if ($this->form_validation->run() == false) {

			$this->load->view('templates/admin_nav', $data);
			$this->load->view('templates/admin_header', $data);
			$this->load->view('templates/admin_sidebar', $data);
			$this->load->view('menu/index', $data);
			$this->load->view('templates/admin_footer');		
		} else {
			$this->db->insert('user_menu', ['nama_menu' => $this->input->post('menu')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambah!</div>');
			redirect('menu');
		}
	}

	public function submenu() {

		$data['judul'] ='Submenu Management';
		$data['admin'] =  $this->db->get_where('admin', ['username_admin' => $this->session->userdata('username_admin')])->row_array();
		$data['menu'] = $this->db->get('user_menu')->result_array();

		//kalo querynya gini kita gabisa tampilin nama menu pada tabel user menu karena belum dijoinkan, solusinya join 2 tabel
		// $data['submenu'] = $this->db->get('user_submenu')->result_array();

		//diambil dari model, model adalah alias dari menu model
		$this->load->model('Menu_model', 'menu');
		$data['submenu'] = $this->menu->getSubmenu();


		$this->form_validation->set_rules('submenu', 'Nama Submenu', 'required');
		$this->form_validation->set_rules('id_menu', 'Nama Menu', 'required');
		$this->form_validation->set_rules('url', 'Url', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/admin_nav', $data);
			$this->load->view('templates/admin_header', $data);
			$this->load->view('templates/admin_sidebar', $data);
			$this->load->view('menu/submenu', $data);
			$this->load->view('templates/admin_footer');			
		} else {

			$data = [
				'nama_submenu' => $this->input->post('submenu'),
				'id_menu' => $this->input->post('id_menu'),
				'url_submenu' => $this->input->post('url'),
				'icon_submenu' => $this->input->post('icon'),
				'is_active_submenu' => $this->input->post('is_active'),
			];
			
			$this->db->insert('user_submenu', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambah!</div>');
			redirect('menu/submenu');
		}
	}

	public function hapusMenu($id_menu) {
		// $data['admin'] =  $this->db->get_where('admin', ['username_admin' => $this->session->userdata('username_admin')])->row_array();
		// $data['menu'] = $this->db->get('user_menu')->result_array();

		$this->db->where('id_menu', $id_menu);
		$this->db->delete('user_menu');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
			redirect('menu');
	}

	public function hapusSubmenu($id_submenu) {
		// $data['admin'] =  $this->db->get_where('admin', ['username_admin' => $this->session->userdata('username_admin')])->row_array();
		// $data['menu'] = $this->db->get('user_menu')->result_array();

		$this->db->where('id_submenu', $id_submenu);
		$this->db->delete('user_submenu');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
			redirect('menu/submenu');
	}

	public function getMenu() {
		// echo 'ok';
		// echo json_encode($this->input->post('id'));
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$id = $this->input->post('id');
		echo json_encode($this->db->get_where('user_menu', ['id_menu' => $id])->row_array());
	}

	public function ubahMenu() {
		$data['judul'] ='Menu Management';
		$data['admin'] =  $this->db->get_where('admin', ['username_admin' => $this->session->userdata('username_admin')])->row_array();


		$this->form_validation->set_rules('menu', 'Nama Menu', 'required');

		if ($this->form_validation->run() == false) {

			$this->load->view('templates/admin_nav', $data);
			$this->load->view('templates/admin_header', $data);
			$this->load->view('templates/admin_sidebar', $data);
			$this->load->view('menu/index', $data);
			$this->load->view('templates/admin_footer');		
		} else {
			$menu = $this->input->post('menu');
			$id = $this->input->post('id');

			$this->db->set('nama_menu', $menu);
			$this->db->where('id_menu', $id);
			$this->db->update('user_menu');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>');
				redirect('menu');
		}
	}

	public function getSubmenu() {
		// echo 'ok';
		// echo json_encode($this->input->post('id'));
		$data['submenu'] = $this->db->get('user_submenu')->result_array();

		$id = $this->input->post('id');
		echo json_encode($this->db->get_where('user_submenu', ['id_submenu' => $id])->row_array());
	}

	public function ubahSubmenu() {
		$data['judul'] ='Submenu Management';
		$data['admin'] =  $this->db->get_where('admin', ['username_admin' => $this->session->userdata('username_admin')])->row_array();


		$this->form_validation->set_rules('submenu', 'Nama Submenu', 'required');
		$this->form_validation->set_rules('id_menu', 'Nama Menu', 'required');
		$this->form_validation->set_rules('url', 'Url', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if ($this->form_validation->run() == false) {

			$this->load->view('templates/admin_nav', $data);
			$this->load->view('templates/admin_header', $data);
			$this->load->view('templates/admin_sidebar', $data);
			$this->load->view('menu/submenu', $data);
			$this->load->view('templates/admin_footer');		
		} else {
			$id = $this->input->post('id');
			$submenu = $this->input->post('submenu');
			$id_menu = $this->input->post('id_menu');
			$url = $this->input->post('url');
			$icon = $this->input->post('icon');
			$is = $this->input->post('is_active');

			$this->db->set('nama_submenu', $submenu);
			$this->db->set('id_menu', $id_menu);
			$this->db->set('url_submenu', $url);
			$this->db->set('icon_submenu', $icon);
			$this->db->set('is_active_submenu', $is);
			$this->db->where('id_submenu', $id);
			$this->db->update('user_submenu');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>');
				redirect('menu/submenu');
		}
	}
}