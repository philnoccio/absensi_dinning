<?php 
class skripsi_model extends CI_Model{
	public function add($data)
	{
		$this->db->insert('data_absen',$data);
	}
 }?>
