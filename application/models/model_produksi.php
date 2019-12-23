<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_produksi extends CI_Model {
	function __construct(){
			parent::__construct();
			$this->load->helper(array('form','url','string'));
			$this->load->database();
	}
	public function getID($id)
	{
		$idp = $this->db->select('kdproduksi')->get_where('produksi',array('kdproduksi' => $id))->row_array();
		return $idp;
	}
	public function getData(){
			
			$this->db->join('barang','produksi.idbarang = barang.idbarang');
			$query = $this->db->get('produksi');
			$data = $query->result();
			return $data;
				
	}
	public function input($data)
	{
		$this->db->insert('produksi',$data);
	}
}