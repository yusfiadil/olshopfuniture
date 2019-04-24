<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class model extends CI_Model {

		
	function tb_konten(){
	$query=$this->db->query("SELECT * FROM konten");
	return $query->result();
	}

function tb_profil(){
	$query=$this->db->query("SELECT * FROM profilperusahaan");
	return $query->result();
	}

function tb_kategori(){
	$query=$this->db->query("SELECT * FROM kategori");
	return $query->result();
	}

	function tb_produkid($id){
	$query=$this->db->query("SELECT gambar FROM produk where id='$id'");
	return $query->result();
	}
	
	function tb_leftjoinKdanP(){
	$query=$this->db->query("select a.id as idkat,a.kategori as kategor, b.*,count(b.kategori) as total from kategori a left join produk b on a.id=b.kategori group by a.kategori");
	return $query->result();
	}

function tb_detailproduk($id){
	$query=$this->db->query("select * from produk where kategori='$id'");
	return $query->result();
	}

function input_data($data,$table){
		$this->db->insert($table,$data);
	}
public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete("kategori");
	}

	public function delete_by_id_produk($id)
	{
		
		$this->db->where('id', $id);
		$this->db->delete("produk");
	}

function tb_produk(){
	$query=$this->db->query("SELECT * FROM produk");
	return $query->result();
	}

function tb_produk_idmax(){
	$query=$this->db->query("SELECT max(id) as kode FROM produk ");
	return $query->result();
	}


public function get_by_id($id,$tabel)
	{
		$this->db->from($tabel);
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row();
	}

public function update($where, $data,$tabel)
	{
		$this->db->update($tabel, $data, $where);
		return $this->db->affected_rows();
	}

public function cek_user($data) {
			$query = $this->db->get_where('admin', $data);
			return $query;
}


	}

?>