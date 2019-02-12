<?php 
 
class m_member extends CI_Model{
	function tampil_data(){
		return $this->db->get_where('tbl_barang', array('status' => 1));
	}
	
	function beli($where){		
		return $this->db->get_where('tbl_barang',$where);
	}
	
	function do_beli($data){
		$this->db->insert('tbl_beli',$data);
	}
	
	function keranjang(){
		return $this->db->get_where('tbl_beli', array('pembeli' => $this->session->userdata('ux_user') ));
	}
	
	function bayar($where){
	$this->db->where($where);
	$this->db->delete('tbl_beli');
	}
	
	function log(){
		return $this->db->get_where('tbl_log_bayar', array('pembeli' => $this->session->userdata('ux_user') ));
	}

	function cari($where){
		return $this->db->query("select * from tbl_barang where deskripsi_barang like '%$where%' and status like '1' ");
	}
}