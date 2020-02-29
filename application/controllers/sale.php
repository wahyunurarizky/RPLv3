<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale extends CI_Controller {

	public function index(){

		$this->load->model('User_model','user');
		$this->load->model('Kategori_model','kategori');
		$data['user'] = $this->user->getUser();
		// $data['sale'] = $this->kategori->getProdukSale();
		
		$this->load->view('templates/header', $data);
		$this->load->view('produk/sale', $data);
		$this->load->view('templates/footer', $data);
	}
}
