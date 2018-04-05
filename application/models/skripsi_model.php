<?php 
class skripsi_model extends CI_Model{
	public function add($data)
	{
		$this->db->insert('tb_absensi',$data);
	}
	public function read()
	{
		return $this->db->get('tb_mahasiswa')->result();
	}
	public function getNimByPin($pin)
	{
		$this->db->where('pin',$pin);
		return $this->db->get('tb_mahasiswa')->row();
	}
	public function insert_mahasiswa($data)
	{
		$this->db->insert('tb_mahasiswa', $data);
	}
 }?>
