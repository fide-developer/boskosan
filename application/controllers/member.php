<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model(array('model_kost','model_pemesanan'));
    }

	public function index()
	{
		$data['kost'] = $this->model_kost->getKost()->result();
		if ($this->session->userdata('level')=='Member') {
            	$this->membertemp->load('membertemp','user/indexmember',$data);
            }
            elseif ($this->session->userdata('level')=='Operator') {
                $this->template->load('template','user/drugs/show_data',$data);
            }       
        else{
            echo "Access Denied";
        }
	}
	public function booked(){
		$user = $this->session->userdata('username');
		$data['pd'] = $this->model_pemesanan->getPending($user);
		$cek = $data['pd']->result();
		$date= Date("Y-m-d H:i:s");

		foreach ($cek as $as) {
			if($date>$as->endtime){
				$this->model_pemesanan->cancelBook($user,$as->id_book,$as->id_kosan,$as->id_room);
			}	
		}
		$data['history'] = $this->model_pemesanan->getHistory($user);
		
		$this->membertemp->load('membertemp','user/booked',$data);
	}
	public function inpBook(){
		$idr = $this->input->post('idr');
		$idk = $this->input->post('idk');
		$test = $this->model_kost->cekRoom($idr);
		$nama = $this->input->post('nama');
		$no_hp = $this->input->post('no_hp');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$data = array('id'=>'','nama'=>$nama,'id_room'=>$this->input->post('idr'),'resi'=>'','no_hp'=>$no_hp,'email'=>$email,'tgl_datang' => $this->input->post('tgl_datang'),'status' => '0','username'=>$username);
		if($test=='1'){
		
		// status 1 -> sudah bayar , status 2 -> menunggu verfikasi, status 3 -> dibatalkan
		$test = $this->model_pemesanan->inpBook($data);
		$this->model_kost->updateKostRoom($idr,$idk);
		if($test == 1){
			echo "mantap sukses tinggal redirek";
		}
		}else{
			echo "Maaf anda telat booking";
		}
	}
	public function upload($name)
	{
		
				$filePath = './asset/picture/coba/resi/';
                $config["upload_path"] = $filePath;
                $config["upload_url"] = base_url() . "asset/picture/coba/resi/";
                $config["allowed_types"] = "jpg|png|jpeg";
                $config["max_size"]    = "462144";    
                $config["overwrite"] = false;     
                //Untuk dapat menggunakan fungsi increment_string pastikan load->helper("string") 
                $this->load->helper("string");
                $filename=increment_string("resi", "_").".jpg";
                //$namafile=$data2["upload_data"]["file_name"];
                $config["file_name"] = $filename; 

               $this->load->library('upload', $config);
               $this->upload->initialize($config);
               if (!$this->upload->do_upload($name))
            {
                // Jika upload gagal
                $upload_error = array("error" => $this->upload->display_errors());
                var_dump($upload_error);
            }
            else
            {
                // Perintah utama mengupload file
                $upload_data = $this->upload->data();
                
                //Mengambil data nama file yg barusan diupload
                $foto = "asset/picture/coba/".$upload_data["file_name"];
                
                //Membuat Thumbnail
                $type = array("image/png"=>"png","image/jpg"=>"jpg","image/jpeg"=>"jpg");
                $config["image_library"] = "gd2";            
                // $config["overwrite"] = TRUE;
                $config["source_image"] = $foto;

                $this->load->library("image_lib", $config);
                $this->image_lib->watermark();
                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                if(!$this->image_lib->resize())
                { 
                    echo $this->image_lib->display_errors();
                }

                $foto_resi=$foto;
                return $foto_resi;
            }
	}
	public function resi(){
		if (isset($_POST['submit'])) {
		
		$id = $this->input->post('idbk');		
		$foto_resi = $this->upload('resi');

		echo $id.$foto_resi;
		$this->model_pemesanan->up_resi($id,$foto_resi);

		redirect('member/booked');
		} else {
			echo "ERROR GOBLOK";
		}
	}


	public function kos(){
		$id = $this->uri->segment(3);
		$data['show'] = $this->model_kost->getKostID($id)->row_array();
		$data['room'] = $this->model_kost->get_room($id)->result();
		if ($this->session->userdata('level')=='Member') {
            	$this->membertemp->load('membertemp','user/detail',$data);
            }
            elseif ($this->session->userdata('level')=='Operator') {
                $this->template->load('template','user/drugs/show_data',$data);
            }       
        else{
            echo "Access Denied";
        }
	}

	public function detail(){
		$id = $this->uri->segment(3);
		$data['show'] = $this->model_kost->getKamarID($id)->row_array();
		if ($this->session->userdata('level')=='Member') {
            	$this->membertemp->load('membertemp','user/detail_kamar',$data);
            }
            elseif ($this->session->userdata('level')=='Operator') {
                $this->template->load('template','user/drugs/show_data',$data);
            }       
        else{
            echo "Access Denied";
        }
	}

	public function get_kost(){
		
		$data['kost'] = $this->model_kost->getKost()->result();

		$this->load->view('indexboskosan',$data);
	}

	public function get_kec_kost(){
		
		$kecamatan = '1';
		$data['kec_kost'] = $this->model_kost->getKostK($kecamatan)->result();

		var_dump($data);
	}

	public function get_kost_id(){
		
		$id = $this->uri->segment(3);

		$data['det'] = $this->model_kost->getKostID($id);

		$this->load->view('detail',$data);
	}

	public function logout(){
		$this->session->sess_destroy();
		echo "<script>
		alert('Success Logout');
		window.location.href='../boskosan/get_kost';
		</script>";
	}

	public function tesarray(){
		$data = "asd, dsa, cas, doom";
		$dt['wk'] = explode(', ', $data);
		var_dump($dt['wk'][3]);  //KERJAIN DI VIEW ABIS SOLJUM
	}
}