<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	public function getUser()
	{
		return $this->db->get_where('users', ['email'=> $this->session->userdata('email')])->row_array();
	}
}
