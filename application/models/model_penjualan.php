<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_penjualan extends CI_Model {
	function __construct(){
			parent::__construct();
			$this->load->helper(array('form','url','string'));
			$this->load->database();
	}
	public function getID($id)
	{
		$idp = $this->db->select('idtransaksi')->where('idtransaksi',$id)->get('penjualan')->row_array();

		return $idp;
	}
	public function getData(){
			
			$this->db->join('barang','penjualan.idbarang = barang.idbarang');
			$query = $this->db->get('penjualan');
			$data = $query->result();
			return $data;
				
	}
	public function input($data)
	{
		$daet = date("Y-m-d");
		$idbrg = $data['idbarang'];
		
		
		$asd = $this->db->select('sisa')->where('idbarang',$idbrg)->where('sisa !=','0')->where('tgl_kadul>=',$daet )->limit('1')->order_by('tgl_kadul','asc')->get('produksi')->row_array();
		$ddb = $asd['sisa'];

		$asdd = $this->db->select_sum('sisa')->where('idbarang',$idbrg)->where('tgl_kadul>=',$daet )->get('produksi')->row_array();
		$ddbt = $asdd['sisa'];

		$j = $data['jumlah'];
		if($ddbt==$j){
			$this->db->insert('penjualan',$data);
			$this->db->where('idbarang',$idbrg)->where('tgl_kadul>=',$daet )->update('produksi',array('sisa' => '0' ));
		}elseif($ddbt>$j){
		$this->db->insert('penjualan',$data);
		

		if($ddb>=$j){
 		$test = $ddb-$j;
		$dt = $this->db->select('kdproduksi')->where('sisa !=','0')->where('tgl_kadul>=',$daet )->where('idbarang',$idbrg )->limit('1')->order_by('tgl_kadul','asc')->get('produksi')->row_array();
		$kp = $dt['kdproduksi'];
		
		$this->db->where('kdproduksi',$kp)->update('produksi',array('sisa' => $test ));
		}else
		{
			$dt = $this->db->select('kdproduksi')->where('sisa !=','0')->where('tgl_kadul>=',$daet )->where('idbarang',$idbrg )->limit('1')->order_by('tgl_kadul','asc')->get('produksi')->row_array();
		
		$kp = $dt['kdproduksi'];

			$test = $j-$ddb;

		$this->db->where('kdproduksi',$kp)->update('produksi',array('sisa' => '0' ));

		while($test>0){

		$asdd = $this->db->select_sum('sisa')->where('sisa !=','0')->where('idbarang',$idbrg)->where('tgl_kadul>=',$daet )->get('produksi')->row_array();
		$ddbt = $asdd['sisa'];

		$asd = $this->db->select('sisa')->where('idbarang',$idbrg)->where('sisa !=','0')->where('tgl_kadul>=',$daet )->limit('1')->get('produksi')->row_array();
		$ddbb = $asd['sisa'];
		if($ddbb>=$test){

		$updt = $ddbb - $test;
		$dt = $this->db->select('kdproduksi')->where('sisa !=','0')->where('tgl_kadul>=',$daet )->where('idbarang',$idbrg )->limit('1')->order_by('tgl_kadul','asc')->get('produksi')->row_array();
		$kp = $dt['kdproduksi'];
		$this->db->where('kdproduksi',$kp)->update('produksi',array('sisa' => $updt ));
		$test = 0;
		}else{
		$updt = $test - $ddbb;
		$dt = $this->db->select('kdproduksi')->where('sisa !=','0')->where('tgl_kadul>=',$daet )->where('idbarang',$idbrg )->limit('1')->order_by('tgl_kadul','asc')->get('produksi')->row_array();
		$kp = $dt['kdproduksi'];
		$this->db->where('kdproduksi',$kp)->update('produksi',array('sisa' => '0' ));
		$test = $updt;
		}		

		}
		}
		
	}else{ return $err = "Error ::banyak penjualan melebihi stok!";}
}
}