<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_pemesanan extends CI_Model {
	
	public function inpBook($data){
		if($this->db->insert('bookr',$data)){
			return "1";
		}

	}
	public function getPending($user){
		$this->db->select('bookr.id as id_book,bookr.status as stat_book,bookr.endtime,bookr.id_room,room.*,kostan.*');
		$this->db->from('bookr');
		$this->db->join('room','bookr.id_room=room.id','right');
		$this->db->join('kostan','room.id_kosan=kostan.id');
		$this->db->where('bookr.status','0');
		$this->db->where('bookr.username',$user);
		$res=$this->db->get();

		return $res;
	}
	public function getDtl($id){
		$this->db->select('bookr.id_room,room.id_kosan');
		$this->db->from('bookr');
		$this->db->join('room','room.id=bookr.id_room');
		$this->db->where('bookr.id',$id);
		return $this->db->get();
	}
	public function cancelBook($id_book,$id_kosan,$id_room){
		// update status booking jadi ditolak

		$this->db->set('status','3');
		$this->db->where('id',$id_book);
		$this->db->update('bookr');

		// update ke room

		$this->db->set('status','1');
		$this->db->where('id',$id_room);
		$this->db->update('room');

		// update jumlah room kosongnya

		$this->db->set('r_kosong','r_kosong+1',false);
		$this->db->where('id',$id_kosan);
		$this->db->update('kostan');
	}
	public function getHistory($user){
		$this->db->select("bookr.id as id_book,if(bookr.status='2','Sedang diverifikasi',if(bookr.status='3','Ditolak','Diterima')) as stat_book,bookr.tgl_pesan,bookr.tgl_bayar,bookr.endtime,room.*,kostan.*");
		$this->db->from('bookr');
		$this->db->join('room','bookr.id_room=room.id','right');
		$this->db->join('kostan','room.id_kosan=kostan.id');
		$this->db->where('bookr.status!=','0');
		$this->db->where('bookr.username',$user);
		$res=$this->db->get();		

		return $res;
	}

	public function getAllPsn(){
		$this->db->select("bookr.id as bookid,bookr.nama as nama_pemesan,if(bookr.status='2','Sedang diverifikasi',if(bookr.status='3','Ditolak','Diterima')) as stat_book,bookr.no_hp as hp,bookr.tgl_datang,if(bookr.tgl_bayar='0000-00-00 00:00:00',' - ',bookr.tgl_bayar) as tgl_bayar,room.nomor_kamar,kostan.*,kostan.alamat as almkos,user.nama,user.no_hp,user.email,user.alamat");
		$this->db->from('bookr');
		$this->db->join('room','bookr.id_room = room.id');
		$this->db->join('kostan','room.id_kosan=kostan.id');
		$this->db->join('user','user.username = kostan.username');
		return $this->db->get();
	}
	public function trmTans($id){

	}
	public function tlkTans($id){

	}
	public function up_resi($idbk,$foto_resi){
		
		$this->db->set('status','2');
		$this->db->set('resi',$foto_resi);
		$this->db->where('id',$idbk);
		$this->db->update('bookr');
	}
	public function getAcp(){
		$this->db->select('bookr.id as bookid,bookr.nama as namabook,bookr.tgl_bayar,bookr.resi,bookr.biaya,bookr.tgl_datang,bookr.id as idbook,kostan.nama_kost,kostan.alamat,user.nama as namapengurus');
		$this->db->from('bookr');
		$this->db->join('room','room.id=bookr.id_room','right');
		$this->db->join('kostan','kostan.id=room.id_kosan','right');
		$this->db->join('user','user.username=kostan.username','right');
		$this->db->where("bookr.status='2'");
		$re = $this->db->get();
		if($re->num_rows()>0){
			return $re;
		}
	}
}