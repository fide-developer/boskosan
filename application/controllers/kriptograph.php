<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriptograph extends CI_Controller {

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
		$this->load->view('kripto.php');
	}
	public function encrypt(){
		
		$plain = $this->input->post('plainTxt');
		$plainTxt = preg_replace('/\s+/', '', $plain);

		$ky = $this->input->post('key');
		$key = preg_replace('/\s+/', '', $ky);

		$pText = strlen($plainTxt);

		$arrPlain = str_split($plainTxt);

		$keystroke = $this->keygen($plainTxt,$key);


		$jkey = count($keystroke);
		$jkey = $jkey - 1;
		$n = 0;
		
		
		while($n < $pText){
			$abj = 0;
			
			while ($abj <= $jkey) {
				if($arrPlain[$n] == $keystroke[$abj]){
					$arrPlain[$n] = ($abj+3)%($jkey+1);
				}
			$abj++;
			}
		
		$n++;
		
		}
		$nn = 0;
		while ($nn < $pText) {
			$cpr = $arrPlain[$nn];
			$arrChipper[$nn] = $keystroke[$cpr];

			$nn++;
		}

		$data['arrChipper'] = $arrChipper;
		$this->load->view('kripto',$data);
		
			
	}

	public function dencrypt(){
		
		$chipperTxt = $this->input->post('chipperTxt');

		
		$ky = $this->input->post('key');
		$key = preg_replace('/\s+/', '', $ky);

		$pText = strlen($chipperTxt);
		$arrPlain = str_split($chipperTxt);

		$keystroke = $this->keygen($chipperTxt,$key);


		$jkey = count($keystroke);
		$jkey = $jkey - 1;
		$n = 0;
		
		
		while($n < $pText){
			$abj = 0;
			
			while ($abj <= $jkey) {
				if($arrPlain[$n] == $keystroke[$abj]){
					$arrPlain[$n] = ($abj+($jkey+1)-3)%($jkey+1);
				}
			$abj++;
			}
		
		$n++;
		
		}
		$nn = 0;
		while ($nn < $pText) {
			$cpr = $arrPlain[$nn];
			$arrChipper[$nn] = $keystroke[$cpr];

			$nn++;
		}

		echo implode($arrChipper);
			
	}
	public function keygen($plainTxt, $key){
		
		$pKey = strlen($key);

		
		$arrKey = str_split($key);

		$cont = 1;
		$in = 1;
		
		if($pKey>0){
			$nkey[0]=$arrKey[0];
		}
		while($in < $pKey){
		$skip = 0;	
			$cek = $in-1;
			while($cek >= 0){
			
				if($arrKey[$in] == $arrKey[$cek]){
		
					$skip = 1;

				}

				$cek--;
			}
			if($skip==0){
				$nkey[$cont]=$arrKey[$in];
				$cont++;
			}
			
			$in++;
		}
			
		if($pKey>0){
		$pnKey = count($nkey);
		}else{
			$pnKey = 0;
		}
		
		$abjad = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
		$maxKey = count($abjad);

		$whl = 0;
		$cont = $pnKey;
		while($whl<$maxKey){
			$skip = 0;
			$cek = 0;
			while($cek < $pnKey){
				 if($nkey[$cek] == $abjad[$whl]){
					$skip = 1;
				}
			$cek++;
			}
		if($skip != 1){
			$nkey[$cont] = $abjad[$whl];
			$cont++;
		}
		$whl++;
		}
		return $nkey;
	}
}
