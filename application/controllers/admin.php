<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model(array('model_user','model_kost','model_pemesanan'));
        $cl = $this->session->userdata('level');
        if(!empty($cl)){
        	if($this->session->userdata('level')=="Member"){
        		redirect('Member');
        	}elseif($this->session->userdata('level')=="Pengurus"){
        		redirect('Pengurus');
        	}
        }else{
        	redirect('Boskosan');
        }
    }

	public function index()
	{
		$data['reqbook']=$this->model_pemesanan->getAcp();

		$this->admintemp->load('admintemp','admin/indexadmin',$data);
	}
	public function tolakTrans(){
		$id = $this->input->get('id');
		$data = $this->model_pemesanan->getDtl($id)->row_array();
		$idkos = $data['id_kosan'];
		$idroom = $data['id_room'];
		$cek = $this->model_pemesanan->cancelBook($id,$idkos,$idroom);
	}
	public function terimaTrans(){
		$id = $this->input->get('id');
		$cek = $this->model_pemesanan->trmTans($id);
	}
	public function master_user(){
		$data['member']=$this->model_user->listUser('Member');
		$data['pengurus']=$this->model_user->listUser('Pengurus');
		$this->admintemp->load('admintemp','admin/manajemenuser',$data);
	}
	public function master_kos(){
		$data['kos'] = $this->model_kost->getKost();
		$this->admintemp->load('admintemp','admin/manajemenkos',$data);
	}
	public function master_pemesanan(){
		$data['pemesanan'] = $this->model_pemesanan->getAllPsn();
		$this->admintemp->load('admintemp','admin/manajemenpemesanan',$data);
	}
	public function logout(){
		$this->session->sess_destroy();
		echo "<script>
		alert('Success Logout');
		window.location.href='../boskosan/get_kost';
		</script>";
	}
}