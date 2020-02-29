<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	public function index()
	{
		$this->load->model('User_model','user');

		$data['user'] = $this->user->getUser();
		$data['checkout'] = $this->db->get_where('checkout',['id_user'=>$data['user']['id']])->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('transaksi/index');
		$this->load->view('templates/footer', $data);
	}
}
