<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_user extends CI_Model {
	function __construct(){
			parent::__construct();
			$this->load->helper(array('form','url','string'));
	}
	
	public function daftar_member($data)
	{
		$this->db->insert('user',$data);
	}

	public function daftar_pengurus($data)
	{
		$this->db->insert('user',$data);
	}

	public function cek_user($username,$password) {
		$query = $this->db->get_where('user',array('username'=>$username,'password'=>md5($password)));
		return $query;
	}

	public function get_peng($username){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username',$username);
		return $this->db->get();
	}
	public function listUser($level){
		$this->db->where('level',$level);
		$res = $this->db->get('user');

		return $res;
	}
}