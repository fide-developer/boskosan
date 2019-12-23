<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model(array('model_kost','model_user'));
    }

	public function index()
	{
		$this->load->view('daftar');
	}

	public function regist_member()
	{
	   	    $password   =  $this->input->post('password',true);
            $level = "Member";
            $username   =  $this->input->post('username');
            $email       =  $this->input->post('email');
			$alamat       =  $this->input->post('alamat');
			$no_hp       =  $this->input->post('no_hp');
			$nama       =  $this->input->post('nama');
			$created_by = date('Y-m-d H:i:s');
			$data       =  array(   'username'=>$username,
                                    'password'=>md5($password),
									'email'=>$email,
									'alamat'=>$alamat,
									'no_hp'=>$no_hp,
									'nama'=>$nama,
									'created_by'=>$created_by,
									'level'=>$level);
            $this->model_user->daftar_member($data);
            redirect('boskosan/get_kost');
	}

	public function regist_pengurus()
	{
			$password   =  $this->input->post('password',true);
            $level = "Pengurus";
            $username   =  $this->input->post('username');
            $email       =  $this->input->post('email');
			$alamat       =  $this->input->post('alamat');
			$no_hp       =  $this->input->post('no_hp');
			$nama       =  $this->input->post('nama');
			$created_by = date('Y-m-d H:i:s');
			$data       =  array(   'username'=>$username,
                                    'password'=>md5($password),
									'email'=>$email,
									'alamat'=>$alamat,
									'no_hp'=>$no_hp,
									'nama'=>$nama,
									'created_by'=>$created_by,
									'level'=>$level);

            $this->model_user->daftar_pengurus($data);
            redirect('boskosan/get_kost');
	}

}