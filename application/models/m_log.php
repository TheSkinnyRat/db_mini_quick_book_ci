<?php 
 
class m_log extends CI_Model{
	function tampil_log(){
		return $this->db->get('tbl_log');
	}

	public function log_daftar(){
		return $this->db->get('tbl_log_daftar');
	}
}