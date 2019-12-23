<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Boskosan extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('model_kost');
    }

	public function index()
	{
		$this->load->view('indexboskosan');
	}
	public function kos(){
		// $this->load->view('detail_kost');
		$id = $this->uri->segment(3);
		$data['show'] = $this->model_kost->getKostID($id);
		$this->load->view('detail_kost',$data);
	}
	public function detail(){
		$this->load->view('detail_kamar');
	}

	public function get_kost(){
		
		$data['kost'] = $this->model_kost->getKost()->result();

		$this->load->view('indexboskosan',$data);
	}

	public function get_kost_id(){
		
		$id = $this->uri->segment(3);

		$data['det'] = $this->model_kost->getKostID($id);

		$this->load->view('detail',$data);
	}
}