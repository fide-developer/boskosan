<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengurus extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model(array('model_kost','model_user'));
    }

	public function index(){
		$username = $this->session->userdata('username');
		$data['users'] = $this->model_user->get_peng($username)->row_array();
		$data['con'] = $this->model_kost->countkos($username);
        $data['count_room'] = $this->model_kost->count_room()->row_array();
		$data['kos'] = $this->model_kost->getpengkos($username)->result();
		
		if ($this->session->userdata('level')=='Pengurus') {
            	$this->pengurustemp->load('pengurustemp','pengurus/indexpengurus',$data);
            }     
        else{
            echo "Access Denied";
        }
	 	
	}
	public function upload($name)
	{
		
				$filePath = './asset/picture/coba/';
                $config["upload_path"] = $filePath;
                $config["upload_url"] = base_url() . "asset/picture/coba/";
                $config["allowed_types"] = "jpg|png|jpeg";
                $config["max_size"]    = "462144";    
                $config["overwrite"] = false;     
                //Untuk dapat menggunakan fungsi increment_string pastikan load->helper("string") 
                $this->load->helper("string");
                $filename=increment_string("file_imgs", "_").".jpg";
                //$namafile=$data2["upload_data"]["file_name"];
                $config["file_name"] = $filename; 

               $this->load->library('upload', $config);
               $this->upload->initialize($config);
               if (!$this->upload->do_upload($name))
            {
                // Jika upload gagal
                $upload_error = array("error" => $this->upload->display_errors());
                echo "EROR NIH AH";
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
                // $config["create_thumb"] = TRUE;
                // $config["maintain_ratio"] = TRUE;
                // $config["width"]         = 75;
                // $config["height"]       = 33;
                // $config["new_image"] = $foto."/thumb";
                $config['wm_text'] = 'BOSKOSAN.COM';
                $config['wm_type'] = 'text';
                $config['wm_font_path'] = './system/fonts/texb.ttf';
                $config['wm_font_size'] = '40';
                $config['wm_font_color'] = '626262';
                $config['wm_vrt_alignment'] = 'middle';
                $config['wm_hor_alignment'] = 'center';
                $this->load->library("image_lib", $config);
                $this->image_lib->watermark();
                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                if(!$this->image_lib->resize())
                { 
                    echo $this->image_lib->display_errors();
                }

                $foto_kos=$foto;
                return $foto_kos;
            }
	}

	public function pengurus_input(){

		if (isset($_POST['submit'])) {
		$username = $this->input->post('username');
		$nama_kost = $this->input->post('nama_kost');
		$id_kota = $this->input->post('id_kota');
		$id_kecamatan = $this->input->post('id_kecamatan');
		$jroom = 0;
        $r_kosong = 0;
        $kos = $this->input->post('fas_kos');
        $fas_kos = implode(', ', $kos);
		$jenis = $this->input->post('jenis');
		$alamat = $this->input->post('alamat');


        $foto_kos = $this->upload('foto_kos');
        $foto_halaman = $this->upload('foto_halaman');
        $foto_parkir = $this->upload('foto_parkir');
		
    	$data=array('username' => $username,
					'nama_kost' => $nama_kost,
					'id_kota' => $id_kota,
					'id_kecamatan' => $id_kecamatan,
					'jroom' => $jroom,
					'jenis' => $jenis,
					'alamat' => $alamat,
					'foto_kos' => $foto_kos,
					'foto_halaman' => $foto_halaman,
					'foto_parkir' => $foto_parkir,
                    'r_kosong' => $r_kosong,
                    'fas_kos' => $fas_kos);

    	$this->model_kost->insert_kos($data);
    	redirect('pengurus');

		}else{
		$data['kota'] = $this->model_kost->city()->result();
		if ($this->session->userdata('level')=='Pengurus') {
            	$this->pengurustemp->load('pengurustemp','pengurus/inputkos',$data);            }     
        else{
            echo "Access Denied";
        }
      }  

	}

	public function pengurus_room(){
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])) {
        $fasil = array();
        $room = array();
        $pic = array();
       
        //buat room
        $room['id_kosan'] = $this->input->post('id_kosan');
        $room['nomor_kamar'] = $this->input->post('nomor_kamar');
        $room['harga'] = $this->input->post('harga');
        $room['keterangan'] = $this->input->post('keterangan');
        $room['status'] = '1';

        //buat fasilitas
        $fasil['id_room'] = $this->input->post('id_room');
        $fas = $this->input->post('fas_kam');
        $fasil['fas_kam'] = implode(", ",(array) $fas);

        //buat pic
        $pic['depan_kamar'] = $this->upload('depan_kamar');
        $pic['kamar'] = $this->upload('kamar');
        $pic['kamar_mandi'] = $this->upload('kamar_mandi');
        $pic['view_luar'] = $this->upload('view_luar');
        

        $this->model_kost->insert_room($room,$fasil,$pic,$id);
        redirect('pengurus');

        }else{
        if ($this->session->userdata('level')=='Pengurus') {
                $data['ids'] = $this->model_kost->get_id_room($id)->row_array();
                $data['id'] = $id;
                $this->pengurustemp->load('pengurustemp','pengurus/inputroom',$data);
            }     
        else{
            echo "Access Denied";
        }
      }

		
	}

	public function get_kota(){
		$id_kota = $this->input->post('id_kota');
		$result = $this->model_kost->get_kecota($id_kota);

		echo json_encode($result);
	}

}

//LANJUT CRUD PENGURUS YEEEE