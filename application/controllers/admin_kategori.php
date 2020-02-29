<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_kategori extends CI_Controller {
	public function index(){
		if($this->session->userdata('role_id') != 1 ){
			redirect('home');
		}
		$this->load->model('Kategori_model');
		
		$data['kategori'] = $this->db->get('kategori_produk')->result_array();
		$data['user'] = $this->db->get_where('users', ['email'=> $this->session->userdata('email')])->row_array();
		

		$this->form_validation->set_rules('kategori', 'kategori', 'required');
		if($this->form_validation->run() == false){
			$this->load->view('templates/header_admin', $data);
			$this->load->view('templates/sidebar_admin', $data);
			$this->load->view('templates/topbar_admin', $data);
			$this->load->view('admin/kategori', $data);
			$this->load->view('templates/footer_admin', $data);
	
		}else{
			$this->db->insert('kategori_produk',['kategori' => $this->input->post('kategori')]);

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			 Kategori baru berhasil ditambahkan.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('admin/kategori');
		}
	}
}
