<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_produk extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('role_id') != 1 ){
			redirect('home');
		}
		$this->load->model('Kategori_model');
			


		
	}

	public function index(){
		$data['user'] = $this->db->get_where('users', ['email'=> $this->session->userdata('email')])->row_array();
		$data['produk'] = $this->Kategori_model->getAllProduk();
		$data['subkategori'] = $this->Kategori_model->getAllSubKategori();
		$data['kategori'] = $this->db->get('kategori_produk')->result_array();

		$this->form_validation->set_rules('kategori', 'kategori', 'required');
		$this->form_validation->set_rules('subkategori', 'sub kategori', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('stok', 'stok', 'required');
		$this->form_validation->set_rules('harga', 'harga', 'required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
		// $this->form_validation->set_rules('gambar', 'gambar', 'required');

		if($this->form_validation->run() == false){
			$this->load->view('templates/header_admin', $data);
			$this->load->view('templates/sidebar_admin', $data);
			$this->load->view('templates/topbar_admin', $data);
			$this->load->view('admin/produk', $data);
			$this->load->view('templates/footer_admin', $data);
	
		}else{
			
		    $config['upload_path']          = './assets/img/item';
		    $config['allowed_types']        = 'gif|jpg|png';
		    $config['file_name']            = $this->input->post('nama');
		    $config['overwrite']			= true;
		    $config['max_size']             = 1024; // 1MB
		    // $config['max_width']            = 1024;
		    // $config['max_height']           = 768;
		    
		    $this->load->library('upload', $config);
		    $gambar = 'default.jpg';
		    if ($this->upload->do_upload('gambar')) {
		        $gambar = $this->upload->data("file_name");

		    }else{
		    	var_dump($this->upload->display_errors());die;
		    }

			$isi = [
				'id_sub_kategori' => $this->input->post('subkategori'),
				'nama' => $this->input->post('nama'),
				'stok' => $this->input->post('stok'),
				'harga' => $this->input->post('harga'),
				'deskripsi' => $this->input->post('deskripsi'),
				'gambar' =>$gambar
			];
			$this->db->insert('produk',$isi);

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			 Kategori baru berhasil ditambahkan.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('admin/produk');
		}
	}
	public function hapus($id){
		$data['user'] = $this->db->get_where('users', ['email'=> $this->session->userdata('email')])->row_array();
		$data['produk'] = $this->Kategori_model->getAllProduk();
		$data['subkategori'] = $this->Kategori_model->getAllSubKategori();
		$data['kategori'] = $this->db->get('kategori_produk')->result_array();
		
		if($this->db->delete('produk',['id' => $id])){

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			 produk berhasil dihapus.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('admin/produk');
		}
		else{
			$this->load->view('templates/header_admin', $data);
			$this->load->view('templates/sidebar_admin', $data);
			$this->load->view('templates/topbar_admin', $data);
			$this->load->view('admin/produk', $data);
			$this->load->view('templates/footer_admin', $data);
		}

	}
}
