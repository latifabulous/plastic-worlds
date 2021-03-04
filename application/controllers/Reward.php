<?php 

class Reward extends CI_Controller {

	//agar yg bisa akses admin hanyalah setelah login 

	public function __construct() {
		parent::__construct();
		$this->load->library('cart');
		// is_logged_in();
	}

	public function index() {
		$data['judul'] ='Tukar reward';
		
		$data['masyarakat'] =  $this->db->get_where('masyarakat', ['username_masyarakat' => $this->session->userdata('username_masyarakat')])->row_array();
			$data['reward'] =  $this->db->get('reward')->result_array();
						$this->db->select_sum('total_poin', 'jumlah');
			$data['poin'] = $this->db->get_where('penukaran_plastik', ['id_masyarakat' => $this->session->userdata('id_masyarakat')])->row_array();


			$this->load->view('templates/auth_header', $data);
			$this->load->view('templates/masyarakat_nav', $data);
			$this->load->view('reward/index', $data);
			$this->load->view('templates/auth_footer');		
		}

		public function tambah($id) {
			$this->load->model('Reward_model', 'reward');

			$reward = $this->reward->find($id);
			$data = [
        'id'      => $reward->id_reward,
        'qty'     => 1,
        'price'   => $reward->jumlah_poin,
        'name'    => $reward->nama_reward,
			];

			$this->cart->insert($data);
			redirect('reward');
		}

		public function detail() {
			$data['judul'] ='Tukar reward';
		
			$data['masyarakat'] =  $this->db->get_where('masyarakat', ['username_masyarakat' => $this->session->userdata('username_masyarakat')])->row_array();
			$data['reward'] = $this->db->get('reward')->result_array();

			$this->db->select_sum('total_poin', 'jumlah');
			$data['poin'] = $this->db->get_where('penukaran_plastik', ['id_masyarakat' => $this->session->userdata('id_masyarakat')])->row_array();


			$this->load->view('templates/auth_header', $data);
			$this->load->view('templates/masyarakat_nav', $data);
			$this->load->view('reward/reward-detail');
			$this->load->view('templates/auth_footer');
		}

		public function tukar() {
			$data['judul'] ='Tukar reward';
		
			$data['masyarakat'] =  $this->db->get_where('masyarakat', ['username_masyarakat' => $this->session->userdata('username_masyarakat')])->row_array();
			$data['reward'] = $this->db->get('reward')->result_array();

			$this->db->select_sum('total_poin', 'jumlah');
			$data['poin'] = $this->db->get_where('penukaran_plastik', ['id_masyarakat' => $this->session->userdata('id_masyarakat')])->row_array();
			$this->load->model('Home_model', 'home');

			$is_proses = $this->home->getReward();
			if ($is_proses){

					$this->cart->destroy();
					$this->load->view('templates/auth_header', $data);
					$this->load->view('templates/masyarakat_nav', $data);
					$this->load->view('reward/reward-tukar');
					$this->load->view('templates/auth_footer');
		
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat, reward berhasil ditukar!</div>');
				redirect('reward');
			}
		}

// 		BEGIN
// 	UPDATE reward SET stok_reward = stok_reward-NEW.jumlah
//     WHERE id_reward = NEW.id_reward;
// END

// BEGIN
// 	UPDATE penukaran_plastik SET total_poin = total_poin-NEW.poin
//     WHERE id_masyarakat = NEW.id_masyarakat;
// END

		public function hapusKeranjang() {
			$this->cart->destroy();
			redirect('reward/detail');
		}
	}
?>