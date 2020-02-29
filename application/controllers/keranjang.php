<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('role_id') != 2){
			redirect('auth');
		}
		$this->load->model('User_model','user');
		$this->load->model('Keranjang_model', 'keranjang');
	}

	public function index(){
		$data['user'] = $this->user->getUser();
		$data['keranjang'] = $this->keranjang->getKeranjangByIdUser($data['user']['id']);

		$this->load->view('templates/header', $data);
		$this->load->view('keranjang/index',$data);	
		$this->load->view('templates/footer', $data);
	}

	public function tambah($idp)
	{
		$query =$this->db->get_where('keranjang', ['id_produk' => $idp] );
		if($query->num_rows() < 1){
			$data['produk'] = $this->db->get_where('produk', ['id' => $idp])->row_array();
			$data['user'] = $this->user->getUser();
			$idu = $data['user']['id'];

			$ker = [
				'id_user' => $idu,
				'id_produk' => $data['produk']['id'],
				'jumlah' => 1,
			];

			$total_harga = $data['produk']['harga'] * $ker['jumlah'];
			$ker['total_harga'] = $total_harga;
			$this->db->insert('keranjang', $ker);

		}
		redirect($this->input->post('uri').'?ker=on');
		
	}

	public function ubahJumlah(){

		$idp = $this->input->post('idp');
		$idk = $this->input->post('idk');

		$produk = $this->db->get_where('produk', ['id'=>$idp])->row_array();

		$jumlah = $this->input->post('jumlah');

		if($jumlah){
			$total_harga = $produk['harga'] * $jumlah;

			$this->db->set('jumlah', $jumlah);
			$this->db->set('total_harga', $total_harga);

			$this->db->where('id', $idk);
			$this->db->update('keranjang');

			echo "Rp. " . $total_harga;

		}
	}


	public function ubahTotal(){
		$this->load->model('User_model','user');
		$data['user'] = $this->user->getUser();
		$keranjang = $this->db->get_where('keranjang', ['id_user' => $data['user']['id']])->result_array();

		$total=0;
		foreach ($keranjang as $ker) {
			$total += $ker['total_harga'];
		}
		echo "Rp. ". $total;
	}
	public function hapus(){
		$this->load->model('User_model','user');
		$user = $this->user->getUser();
		$id = $this->input->post('pid');
		$this->db->delete('keranjang', ['id_produk' => $id, 'id_user'=>$user['id']] );
			


		redirect($this->input->post('uri').'?ker=on');
		// if($this->input->post('segment') == 'true'){
		// }
		// else{
		// 	redirect($this->input->post('uri').'/true');

		// }
	}
}
