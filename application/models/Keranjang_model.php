<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang_model extends CI_Model {
	public function getKeranjangByIdUser($id)
	{
		return $this->db->get_where('keranjang', ['id_user'=> $id])->result_array();
	}

	public function getCheckout(){
		$query = "SELECT `checkout`.* , `status_checkout`.`nama_status`, `users`.`nama`
				  FROM `checkout` 
				  JOIN `status_checkout` 
				    ON `checkout`.`status` = `status_checkout`.`id`
				  JOIN `users`
				  	ON `checkout`.`id_user` = `users`.`id`
				 ";

		return $this->db->query($query)->result_array();



	}
	public function getCheckoutStatus(){

	}
}
