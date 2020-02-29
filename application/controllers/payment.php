<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

	public function index()
	{		
		$this->load->model('User_model', 'user');

		$data['user'] = $this->user->getUser();
		$ker = $this->db->get_where('keranjang', ['id_user' => $data['user']['id']])->result_array();

		if($this->input->post('ongkir')){
			$total=0;
			foreach ($ker as $k) {
				$total += $k['total_harga'];
			}
			$total += $this->input->post('ongkir');

			$this->db->insert('checkout',[
				'id_user'=> $data['user']['id'], 
				'id_alamat' => $this->input->post('id_alamat'), 
				'id_bank'=> $this->input->post('id_bank'),
				'total_harga_semua' => $total, 
				'status'=>1
			]);

			$this->db->order_by('id', 'DESC');
			$idc = $this->db->get('checkout')->row_array()['id'];

			foreach ($ker as $k) {
				$k['id'] = '';
				$k['id_checkout'] = $idc;
				unset($k['id_user']);
				$this->db->insert('produk_checkout',$k);
			}


			$this->db->delete('keranjang',['id_User'=> $data['user']['id']]);	
		}
		

		$data['checkout'] = $this->db->get_where('checkout',['id_user' => $data['user']['id'], 'status'=>1])->row_array();
		$data['bank'] = $this->db->get_where('ceritanya_bank',['id' => $data['checkout']['id_bank']])->row_array();

		$this->form_validation->set_rules('bukti', 'Document', 'callback_file_selected_test');
		
		$this->load->view('payment/index',$data);	
		

	}
	public function upload(){
		$this->load->model('User_model', 'user');

		$data['user'] = $this->user->getUser();
		

		$data['checkout'] = $this->db->get_where('checkout',['id_user' => $data['user']['id'], 'status'=>1])->row_array();
		$data['bank'] = $this->db->get_where('ceritanya_bank',['id' => $data['checkout']['id_bank']])->row_array();

		$this->form_validation->set_rules('bukti', 'Document', 'callback_file_selected_test');
		
		var_dump( $this->form_validation->run());
		if($this->form_validation->run() == true){
			$config['upload_path']          = './assets/img/bukti';
		    $config['allowed_types']        = 'gif|jpg|png';
		    $config['file_name']            = 'bukti_'.$data['user']['id'].'_'.$data['checkout']['id'];
		    $config['overwrite']			= true;
		    $config['max_size']             = 1024; // 1MB
		    // $config['max_width']            = 1024;
		    // $config['max_height']           = 768;
		    
		    $this->load->library('upload', $config);
		    $gambar = 'default.jpg';
		    if ($this->upload->do_upload('bukti')) {
		        $gambar = $this->upload->data("file_name");

		    }else{
		    	var_dump($this->upload->display_errors());die;
		    }


			$this->db->where('id', $data['checkout']['id']);
			$this->db->update('checkout', ['bukti' => $gambar, 'upload_bukti'=>1]);

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			 foto berhasil diuplload.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
		}
		redirect('payment');
	}
	function file_selected_test(){

	    $this->form_validation->set_message('file_selected_test', 'Please select file.');
	    if (empty($_FILES['bukti']['name'])) {
	            return false;
	        }else{
	            return true;
	        }
	}
}
