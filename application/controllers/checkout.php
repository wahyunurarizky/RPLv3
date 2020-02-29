<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('role_id') != 2){
			redirect('auth');
		}
	}
	public function index()
	{
		if($this->input->post()){
			$idalmt = $this->input->post('alamat');

			$this->db->set('active', '0');
			$this->db->update('alamat');
			$this->db->set('active', '1');
			$this->db->where('id', $idalmt);
			$this->db->update('alamat');
		}

		$this->load->model('User_model','user');
		$data['user'] = $this->user->getUser();
		$data['alamat'] = $this->db->get_where('alamat',['id_user' => $data['user']['id'], 'active' => 1])->row_array();
		$data['alamats'] = $this->db->get_where('alamat', ['id_user' => $data['user']['id']])->result_array();
		$data['bank'] = $this->db->get('ceritanya_bank')->result_array();
		$data['keranjang'] = $this->db->get_where('keranjang',['id_user' => $data['user']['id']])->result_array(); 

		$this->load->view('checkout/index',$data);	
		
	}
}
