<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		if(!$this->session->has_userdata('email')){
			$data = [
				'email' => 'kosong',
				'role_id' => 3
			];
			$this->session->set_userdata($data);
		}

		$this->load->model('Kategori_model', 'kategori');
		$this->load->model('User_model','user');
	}

	// Tampil All-Kategori
	public function index()
	{
		$data['user'] = $this->user->getUser();
		$data['all_kategori'] = $this->kategori->getKategoriProduk();
		
		$this->load->view('templates/header', $data);
		$this->load->view('produk/index', $data);
		$this->load->view('templates/footer', $data);
	}

	// Tampil Kategori
	public function tampilKategori($kategori){
		$data['user'] = $this->user->getUser();
		$data['produk'] = $this->kategori->getProdukByNameKtg($kategori);
		$data['sub_kategori'] = $this->kategori->getSubKategoriByNameKtg($kategori);
		
		$this->load->view('templates/header', $data);
		$this->load->view('produk/template_kategori', $data);
		$this->load->view('templates/footer', $data);		
	}
	
	// Tampil Sub Kategori
	public function tampilSubKategori($kategori, $sub){
		$data['user'] = $this->user->getUser();
		$data['produk'] = $this->kategori->getProdukByNameSub($sub);
		$data['sub'] = $this->kategori->getSubKtgByName($sub);

		$this->load->view('templates/header', $data);
		$this->load->view('produk/template_sub_kategori', $data);
		$this->load->view('templates/footer', $data);
	}
}