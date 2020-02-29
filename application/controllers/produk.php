<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function detail($id){
		$this->load->model('User_model','user');
		$data['produk'] = $this->db->get_where('produk', ['id' => $id])->row_array();
		$data['user'] = $this->user->getUser();

		$this->load->view('templates/header', $data);
		$this->load->view('produk/template_produk',$data);	
		$this->load->view('templates/footer', $data);
	}
}
