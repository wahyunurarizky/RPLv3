<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	public function all()
	{	
		$keyword = $this->input->get('keyword');
		$this->load->model('User_model','user');
		$data['user'] = $this->user->getUser();

		$this->db->like('nama', $keyword);
		$this->db->or_like('deskripsi', $keyword);
		$data['produk'] = $this->db->get('produk')->result_array();


		$this->load->view('templates/header', $data);
		$this->load->view('search/all',$data);	
		$this->load->view('templates/footer', $data);
	}
}
