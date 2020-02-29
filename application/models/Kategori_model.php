<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {
	public function getKategori($i)
	{
		return $this->db->get_where('sub_kategori_produk', ['id_kategori' => $i])->result_array();

	}
	// asdasdas
	public function getProdukByNameKtg($kategori){
		$id = $this->db->get_where('kategori_produk', ['kategori' => $kategori])->row_array()['id'];
		$query = "SELECT `produk`.*
				  FROM `produk` JOIN `sub_kategori_produk` 
				    ON `produk`.`id_sub_kategori` = `sub_kategori_produk`.`id`
				 WHERE `sub_kategori_produk`.`id_kategori` = $id
				 ";

		return $this->db->query($query)->result_array();
	}
	public function getSubKategoriByNameKtg($kategori)
	{
		$id = $this->db->get_where('kategori_produk', ['kategori' => $kategori])->row_array()['id'];
		return $this->db->get_where('sub_kategori_produk', ['id_kategori' => $id])->result_array();
	}


	public function getKategoriProduk(){
		return $this->db->get('kategori_produk')->result_array();
	}
	public function getProdukByIdKtg($id_ktg){
		$query = "SELECT `produk`.*
				  FROM `produk` JOIN `sub_kategori_produk` 
				    ON `produk`.`id_sub_kategori` = `sub_kategori_produk`.`id`
				 WHERE `sub_kategori_produk`.`id_kategori` = $id_ktg
				 ORDER BY id DESC
		";
		return $this->db->query($query)->result_array();
	}

	public function getProdukByNameSub($detail){
		$id = $this->db->get_where('sub_kategori_produk', ['sub_kategori' => $detail])->row_array()['id'];
		return $this->db->get_where('produk',['id_sub_kategori' => $id])->result_array();
	}

	public function getSubKtgByName($sub){
		return $this->db->get_where('sub_kategori_produk', ['sub_kategori' => $sub])->row_array();
	}

	public function getAllSubKategori(){
		$query = "SELECT `kategori_produk`.*, `sub_kategori_produk`.*
				  FROM `sub_kategori_produk` JOIN `kategori_produk` 
				    ON `sub_kategori_produk`.`id_kategori` = `kategori_produk`.`id`
				 ";
		return $this->db->query($query)->result_array();
	}

	public function getAllProduk(){
		$query = "SELECT `kategori_produk`.`kategori`, `sub_kategori_produk`.`sub_kategori`, `produk`.* 
				  FROM `produk` 
				  JOIN `sub_kategori_produk` ON `produk`.`id_sub_kategori` = `sub_kategori_produk`.`id` 
				  JOIN `kategori_produk` ON `sub_kategori_produk`.`id_kategori` = `kategori_produk`.`id`
				";
		return $this->db->query($query)->result_array();	
	}

}
