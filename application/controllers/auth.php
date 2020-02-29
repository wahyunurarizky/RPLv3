<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function index()
	{
		if($this->session->userdata('role_id') != 3){
			redirect('home');
		}

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'password', 'required|trim');
		if($this->form_validation->run() == false){
			$this->load->view('auth/index');
		}
		else{
			$this->_login();
		}

	}
	private function _login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('users', ['email' => $email])->row_array();

		if($user){
			if($user['aktif'] == 1){
				if(password_verify($password, $user['password'])){
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if($user['role_id'] == 1){
						redirect('admin/dashboard');
					}else{
						redirect('home');
					}
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					password salah !
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
					redirect('auth');
				}
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Email belum teraktivasi
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
				redirect('auth');
			}
		}
		else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Email salah
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('auth');

		}
	}
	public function register()
	{
		if($this->session->userdata('role_id') != 3){
			redirect('home');
		}

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password1', 'password', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password2', 'repeat password', 'trim|required|matches[password1]');

		if($this->form_validation->run() == false){
		$this->load->view('auth/register');
		}else{
			$data = [
				'email' => htmlspecialchars($this->input->post('email'),true),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'nama' => htmlspecialchars($this->input->post('nama'),true),
				'gambar' => 'default.png',
				'tanggal' => time(),
				'aktif' => 1,
				'role_id' => 2
			];

			$this->db->insert('users', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			 Akun baru berhasil dibuat.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('auth');
		}
	}
	public function logout(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$data = [
			'email' => 'kosong',
			'role_id' => 3
		];
		$this->session->set_userdata($data);
		redirect('home');
	}
}
