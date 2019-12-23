<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perhitungan extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('homeperhitungan');
	}

	public function zodiak()
	{
		$cek = $this->input->post('submitted');
		if(isset($cek)){
			$zodiak['tgl_lahir'] = $this->input->post('date');
			$z = $zodiak['tgl_lahir'];
			list($day,$month,$year) = split('[/.-]',$z);
			if((($day>=22)&&($month==12))||(($day<=20)&&($month==1))){
				$zodiak['zodiak'] = "Capricorn";
			}
			if((($day>=21)&&($month==1))||(($day<=19)&&($month==2))){
				$zodiak['zodiak'] = "Aquarius";
			}
			if((($day>=20)&&($month==2))||(($day<=21)&&($month==3))){
				$zodiak['zodiak'] = "Pisces";
			}
			if((($day>=21)&&($month==3))||(($day<=19)&&($month==4))){
				$zodiak['zodiak'] = "Aries";
			}
			if((($day>=21)&&($month==4))||(($day<=20)&&($month==5))){
				$zodiak['zodiak'] = "Taurus";
			}
			if((($day>=21)&&($month==5))||(($day<=21)&&($month==6))){
				$zodiak['zodiak'] = "Gemini";
			}
			if((($day>=22)&&($month==6))||(($day<=22)&&($month==7))){
				$zodiak['zodiak'] = "Cancer";
			}
			if((($day>=23)&&($month==7))||(($day<=23)&&($month==8))){
				$zodiak['zodiak'] = "Leo";
			}
			if((($day>=24)&&($month==8))||(($day<=22)&&($month==9))){
				$zodiak['zodiak'] = "Virgo";
			}
			if((($day>=23)&&($month==9))||(($day<=23)&&($month==10))){
				$zodiak['zodiak'] = "Libra";
			}
			if((($day>=24)&&($month==10))||(($day<=22)&&($month==11))){
				$zodiak['zodiak'] = "Scorpio";
			}
			if((($day>=23)&&($month==11))||(($day<=21)&&($month==12))){
				$zodiak['zodiak'] = "Sagitarius";
			}

			$this->load->view('zodiak_view',$zodiak);
		}else{
			$this->load->view('zodiak_input');
		}
	}

	public function volumeprismasegitiga()
	{
		$cek = $this->input->post('submitted');
		if(isset($cek)){
			$prisma['p'] = $this->input->post('p');
			$prisma['l'] = $this->input->post('l');
			$prisma['t'] = $this->input->post('t');

			$prisma['vol'] = $prisma['l']*$prisma['p']*$prisma['t']/2;

			$this->load->view('volumeprismasegitiga_view',$prisma);
		}else{
			$this->load->view('volumeprismasegitiga_input');
		}
	}

	public function jaraktempuh()
	{
		$cek = $this->input->post('submitted');
		if(isset($cek)){
			$jarak['waktu'] = $this->input->post('waktu');
			$jarak['kecepatan'] = $this->input->post('kec');

			$jarak['jarak'] = $jarak['waktu']*$jarak['kecepatan'];

			$this->load->view('jaraktempuh_view',$jarak);
		}else{
			$this->load->view('jaraktempuh_input');
		}
	}

	public function sisimiringsegitiga()
	{
		$cek = $this->input->post('submitted');
		if(isset($cek)){
			$segitiga['stegak'] = $this->input->post('stegak');
			$segitiga['sdatar'] = $this->input->post('sdatar');

			$a = $segitiga['stegak']*$segitiga['stegak'];
			$b = $segitiga['sdatar']*$segitiga['sdatar'];

			$hsl = $a+$b;

			$segitiga['smiring'] = sqrt($hsl);

			$this->load->view('sisimiringsegitiga_view',$segitiga);
		}else{
			$this->load->view('sisimiringsegitiga_input');
		}
	}

	public function luaspermukaantabung()
	{
		$cek = $this->input->post('submitted');
		if(isset($cek)){
			$tabung['diameter'] = $this->input->post('d');
			$tabung['tinggi'] = $this->input->post('t');
			$r = $tabung['diameter']/2;
			$phi = 3.14;

			$tabung['lp'] = 2*$phi*$r*($tabung['tinggi']+$r);

			$this->load->view('lptabung_view',$tabung);
		}else{
			$this->load->view('lptabung_input');
		}
	}
	public function luaspermukaanbola()
	{
		$cek = $this->input->post('submitted');
		if(isset($cek)){
			$bola['diameter'] = $this->input->post('d');
			$r = $bola['diameter']/2;
			$phi = 3.14;

			$bola['lp'] = 4*$phi*$r*$r;

			$this->load->view('lpbola_view',$bola);
		}else{
			$this->load->view('lpbola_input');
		}
	}
	public function bonusmasakerja()
	{
		$cek = $this->input->post('submitted');
		if(isset($cek)){
			$bonus['masakerja'] = $this->input->post('mskerja');

			$test = $bonus['masakerja'];

			if(($test>=5)&&($test<10)){
				$bonus['bonus'] = "Cincin emas 5 gr";
			}else if(($test>=10)&&($test<20)){
				$bonus['bonus'] = "Cincin emas 10 gr";
			}else if($test>=20){
				$bonus['bonus'] = "Cincin emas 20 gr";
			}else{
				$bonus['bonus'] = "Bonus Tidak Ada";
			}
			$this->load->view('bonusmasakerja_view',$bonus);
		}else{
			$this->load->view('bonusmasakerja_input');
		}
	}
	public function besarkecil()
	{
		$cek = $this->input->post('submitted');
		if(isset($cek)){
			$angka['a'] = $this->input->post('a');
			$angka['b'] = $this->input->post('b');

			if($angka['a']==$angka['b']){
				$angka['ket'] = $angka['a']." = ".$angka['b'];
			}else if($angka['a']<$angka['b']){
				$angka['ket'] = $angka['a']." < ".$angka['b'];
			}else{
				$angka['ket'] = $angka['a']." > ".$angka['b'];
			}
			$this->load->view('besarkecil_view',$angka);
		}else{
			$this->load->view('besarkecil_input');
		}
	}
	public function ganjilgenap()
	{
		$cek = $this->input->post('submitted');
		if(isset($cek)){
			$angka['angka'] = $this->input->post('angka');

			$test = $angka['angka']%2;

			if($test==0){
				$angka['ket'] = "GENAP";
			}else{
				$angka['ket'] = "GANJIL";
			}
			$this->load->view('ganjilgenap_view',$angka);
		}else{
			$this->load->view('ganjilgenap_input');
		}
	}
	public function tahunkabisat(){
		$cek = $this->input->post('submitted');
		if(isset($cek)){
		$data['tahun'] = $this->input->post('tahun');

		$test = $data['tahun']%4;

		if($test==0){
			$data['ket'] = "Tahun ".$data['tahun']." Merupakan Tahun Kabisat";	
		}else{
			$data['ket'] = "Tahun ".$data['tahun']." Bukan Tahun Kabisat";
		}
		

		$this->load->view('kabisat_view',$data);
	}else{
		$this->load->view('kabisat_input');
	}
	}
}
