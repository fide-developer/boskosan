<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_kost extends CI_Model {
	function __construct(){
			parent::__construct();
			$this->load->helper(array('form','url','string'));
	}
	//Ambil semua data kost
	public function getKost(){
			$this->db->select('*');
			$this->db->from('kostan');
			return $this->db->get();	
	}

	//Ambil data kost berdasarkan kecamatan dan kota yang dipilih
	public function getKostK($kecamatan){
			$this->db->select('*');
			$this->db->from('kostan');
			$this->db->where('kecamatan',$kecamatan);
			return $this->db->get();
	}
}