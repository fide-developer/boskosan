<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model(array('model_user','model_kost'));
    }

	public function index()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$hasil = $this->model_user->cek_user($username,$password);

		if ($hasil->num_rows() == 1) {
			$this->db->where('username',$username);
			$this->db->update('user',array('last_login'=>date('Y-m-d')));
			$this->session->set_userdata(array('status_login'=>'oke','username'=>$username));
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] = 'true';
				$sess_data['username'] = $sess->username;
				$sess_data['email'] = $sess->email;
				$sess_data['alamat'] = $sess->alamat;
				$sess_data['no_hp'] = $sess->no_hp;
				$sess_data['nama'] = $sess->nama;
				$sess_data['level'] = $sess->level;
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('level')=='Admin') {
				redirect('admin');
			}
			elseif ($this->session->userdata('level')=='Member') {
				redirect('member');
			}elseif ($this->session->userdata('level')=='Pengurus'){
				redirect('pengurus');
			}		
		}else{
			echo "<script>alert('Login Failed: Check username and password!');history.go(-1);</script>";
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		echo "<script>
		alert('Success Logout');
		window.location.href='../boskosan/get_kost';
		</script>";
	}
}