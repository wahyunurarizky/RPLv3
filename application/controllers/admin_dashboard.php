<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller {
	public function index(){
		if($this->session->userdata('role_id') != 1 ){
			redirect('home');
		}
		$this->load->model('Kategori_model', 'kategori');
		$this->load->model('User_model', 'user');
		$this->load->model('Keranjang_model', 'keranjang');

		$data['user'] = $this->user->getUser();
		$data['checkout'] = $this->keranjang->getCheckout();
		// $data['status'] = $this->keranjang->getCheckoutStatus();

		$this->load->view('templates/header_admin', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar_admin', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer_admin', $data);
	}
	public function lihatProduk(){
		$this->load->view('admin/dashboard_produk');
	}
}
