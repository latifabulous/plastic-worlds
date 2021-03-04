<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {
     
    public function __construct(){
        parent::__construct();
				// is_logged_in();
        
        // $this->load->model('Post_model','post_model');
        $this->load->library('upload');
    }
 
    public function index() {

		$data['komunitas'] =  $this->db->get_where('komunitas', ['username_komunitas' => $this->session->userdata('username_komunitas')])->row_array();
			
		$this->form_validation->set_rules('artikel', 'Judul artikel', 'required|trim');
		$this->form_validation->set_rules('contents', 'Isi artikel', 'required');
		
		if ($this->form_validation->run() == false) {

			$data['judul'] ='Tambah Artikel';
			$this->load->view('templates/komunitas_nav', $data);
			$this->load->view('templates/artikel_header', $data);
			$this->load->view('templates/admin_sidebar', $data);
			$this->load->view('komunitas/komunitas-tambah-artikel', $data);
			$this->load->view('templates/artikel_footer');	

		} else {
			$id = $this->session->userdata('id_komunitas');
			$upload_gambar = $_FILES['gambar']['name'];
	    $judul = $this->input->post('artikel', TRUE);
	    $desc = $this->input->post('desc', TRUE);
	    $contents = $this->input->post('contents', TRUE);

			$data = [
				'judul_artikel' => $judul,
				'gambar_artikel' => $upload_gambar,
				'desc_artikel' => $desc,
				'date_created_artikel' => time(),
				'isi_artikel' => $contents,
				'id_komunitas' => $id
			];

			if($upload_gambar) { //ada gambar yg diupload
				$config['upload_path'] = './assets/img/artikel/';
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size']     = '2024';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('gambar')) {
					$upload_gambar = $this->upload->data('file_name');
				} else {
					 echo $this->upload->display_errors();
				}
			}

			$this->db->insert('artikel', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Artikel berhasil ditambah!</div>');
			redirect('komunitas/artikel');
		}
   }

   public function hapusArtikel($id_artikel) {
	
		$this->db->where('id_artikel', $id_artikel);
		$this->db->delete('artikel');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Artikel berhasil dihapus!</div>');
			redirect('komunitas/artikel');
	}
 
    //Upload image summernote
   public function upload_image(){
    if(isset($_FILES["image"]["name"])){
        $config['upload_path'] = './assets/img/artikel/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $this->upload->initialize($config);
        if(!$this->upload->do_upload('image')){
          $this->upload->display_errors();
          return FALSE;
        }else{
          $data = $this->upload->data();
          //Compress Image
          $config['image_library']='gd2';
          $config['source_image']='./assets/img/artikel/'.$data['file_name'];
          $config['create_thumb']= FALSE;
          $config['maintain_ratio']= TRUE;
          $config['quality']= '60%';
          $config['width']= 800;
          $config['height']= 800;
          $config['new_image']= './assets/img/artikel/'.$data['file_name'];
          $this->load->library('image_lib', $config);
          $this->image_lib->resize();
          echo base_url().'assets/img/artikel/'.$data['file_name'];
        }
    	}
    }
 
  //Delete image summernote
  public function delete_image(){
    $src = $this->input->post('src');
    $file_name = str_replace(base_url(), '', $src);
    if(unlink($file_name))
    {
      echo 'File Delete Successfully';
    }
  }
}


?>