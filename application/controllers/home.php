<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$this->load->model('User_model', 'user');

		if(!$this->session->has_userdata('email')){
			$data = [
				'email' => 'kosong',
				'role_id' => 3
			];
			$this->session->set_userdata($data);
		}

		$data['user'] = $this->user->getUser();

		$this->load->view('templates/header', $data);
		$this->load->view('home/index', $data);
		$this->load->view('templates/footer', $data);
	}
}
