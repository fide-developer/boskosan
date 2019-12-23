<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_kost extends CI_Model {
	
	public function getKost(){
			//Ambil semua data kost
			$this->db->select('a.id as idk,a.foto_kos,a.nama_kost,a.alamat,a.jenis,a.jroom,b.*,c.*,d.nama,d.no_hp,d.alamat as alamat_pengurus');
			$this->db->from('kostan a');
			$this->db->from('kecamatan b');
			$this->db->from('kota c');
			$this->db->from('user d');
			$this->db->where('a.id_kecamatan = b.id');
			$this->db->where('a.id_kota = c.id');
			$this->db->where('a.username = d.username');
			$this->db->order_by('a.id');
			return $this->db->get();	
	}

	public function getKostK($kecamatan){
			//Ambil data kost berdasarkan kecamatan dan kota yang dipilih
			$this->db->select('*');
			$this->db->from('kostan a');
			$this->db->join('tb_kecamatan b', 'a.id_kecamatan = b.id_kecamatan');
			$this->db->where('a.id_kecamatan',$kecamatan);
			$this->db->where('b.id_kecamatan',$kecamatan);
			return $this->db->get();
	}
	public function cekRoom($id){
		$this->db->where('id',$id);
		$this->db->where('status','1');
		$asd = $this->db->get('room');
		return $asd->num_rows();
	}
	public function updateKostRoom($idr,$idk){
		$this->db->set('status','2');
		$this->db->where('id',$idr);
		$this->db->update('room');

		$this->db->set('r_kosong','r_kosong-1',false);
		$this->db->where('id',$idk);
		$this->db->update('kostan'); 
	}
	public function getKostID($id){

		return $this->db->query('SELECT a.*,b.nomor_kamar,b.keterangan,c.*,d.fas_kam,e.*,f.*,g.nama,g.username,g.email,g.no_hp,g.alamat as alamat_user from kostan as a, room as b, room_pic as c, fasilitas as d, kota as e, kecamatan as f, user as g where a.id = b.id_kosan and b.id = c.id_room and b.id = d.id_room and a.id_kota = e.id and a.id_kecamatan = f.id and a.username = g.username and a.id ='.$id);
	}

	public function getKamarId($id){
		$this->db->select('*');
		$this->db->from('room a');
		$this->db->from('room_pic b');
		$this->db->from('fasilitas c');
		$this->db->from('kostan d');
		$this->db->where('a.id_kosan = d.id');
		$this->db->where('a.id = b.id_room');
		$this->db->where('a.id = c.id_room');
		$this->db->where('a.id',$id);
		return $this->db->get();
	}

	public function countkos($username){
		$this->db->select('*');
        $this->db->from('kostan');
        $this->db->where('username', $username);
        return $this->db->count_all_results();
	}

	public function getpengkos($username){
		$this->db->select('a.*, b.id as id_room, b.id_kosan, b.nomor_kamar, b.keterangan, b.harga, b.status');
		$this->db->from('kostan a');
		$this->db->join('room  b','b.id_kosan = a.id','left outer');
		$this->db->where('a.username',$username);
		$this->db->group_by('a.id');
		return $this->db->get();

	}

	public function city(){
		$this->db->select('*');
		$this->db->from('kota');
		return $this->db->get();
	}

	public function get_kecota($id_kota){
		$this->db->select('*');
		$this->db->from('kecamatan');
		$this->db->where('id_kota',$id_kota);
		return $this->db->get()->result();
	}

	public function insert_kos($data){
		$this->db->insert('kostan',$data);
	}

	//room

	public function insert_room($room,$fasil,$pic,$id){
			//ini multiple table
        $this->db->insert('room',$room);
        $id_room = $this->db->insert_id();
        
        $fasil['id_room'] = $id_room;
        $this->db->insert('fasilitas',$fasil);

        $pic['id_room'] = $id_room;
        $this->db->insert('room_pic',$pic);

        //UPDATE RUANGAN
	    $this->db->query('UPDATE kostan as a JOIN room as r
       					ON a.id = r.id_kosan
       					SET a.jroom = jroom + 1, a.r_kosong = r_kosong + 1
       					WHERE a.id ='.$id);

        return $insert_id = $this->db->insert_id();
	}

	public function count_room(){
		$this->db->select('a.*,b.*, COUNT(b.id_kosan) as C_ROOM');
		$this->db->from('kostan a');
		$this->db->from('room b');
		$this->db->where('a.id = b.id_kosan');
		$this->db->where('b.id_kosan = 1');
		return $this->db->get();
	}

	public function get_id_room($id){
		$this->db->select('id');
		$this->db->from('kostan');
		$this->db->where('id =',$id);
		return $this->db->get();
	}

	public function get_room($id){
		$this->db->select('a.*, b.id as id_r,b.keterangan,b.id_kosan,b.harga,b.nomor_kamar,b.status,c.*,d.*');
		$this->db->from('kostan a');
		$this->db->from('room b');
		$this->db->from('room_pic c');
		$this->db->from('fasilitas d');
		$this->db->where('a.id = b.id_kosan');
		$this->db->where('b.id = c.id_room');
		$this->db->where('b.id = d.id_room');
		$this->db->where('b.id_kosan =',$id);
		return $this->db->get();
	}

	public function tess(){
		$this->db->select('fas_kam');
		$this->db->from('fasilitas');
		$this->db->where('id = 29');
		return $this->db->get();
	}
}