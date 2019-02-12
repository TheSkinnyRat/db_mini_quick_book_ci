<?php 
 
class m_crud extends CI_Model{
	function tampil_data(){
		return $this->db->get('tbl_barang');
	}
 
	function input_data($data){
		$this->db->insert('tbl_barang',$data);
	}
	
	function hapus_data($where){
	$this->db->where($where);
	$this->db->delete('tbl_barang');
	}
	
	function edit_data($where){		
		return $this->db->get_where('tbl_barang',$where);
	}
	
	function update_data($where,$data){
		$this->db->where($where);
		$this->db->update('tbl_barang',$data);
	}

	public function cek_register($where){	
			$ux_user = $this->input->post('ux_user');
			$ux_pass = $this->input->post('ux_pass');
			$data = array(
				'ux_user' => $ux_user,
				'ux_pass' => md5($ux_pass),
				);	
			return $this->db->get_where("tbl_login",$where);
	}

	public function do_registerRecord($data){
		$this->db->insert('tbl_login',$data);
	}
	function cari($where){
		return $this->db->query("select * from tbl_barang where deskripsi_barang like '%$where%'");
	}
}