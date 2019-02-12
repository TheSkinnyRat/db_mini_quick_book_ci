<?php 

class c_login extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
		
	}

	function index(){
		if($this->session->userdata('ux_akses') == "super_admin"){ 
			redirect(base_url('c_super_admin'));
		}elseif($this->session->userdata('ux_akses') == "admin"){ 
			redirect(base_url('c_admin'));
		}elseif($this->session->userdata('ux_akses') == "member"){ 
			redirect(base_url('c_member'));
		}else{
		$this->load->view('v_login');
		}
	}

	public function aksi_login(){
		$username = $this->input->post('user');
		$password = $this->input->post('pass');
		$where = array(
			'ux_user' => $username,
			'ux_pass' => md5($password),
			);
		
		$cek = $this->m_login->cek_login($where);
		if($cek->num_rows() > 0){

			foreach($cek->result() as $data){
				$sess_data['ux_user'] = $data->ux_user;
				$sess_data['ux_akses'] = $data->ux_akses;
				$this->session->set_userdata($sess_data);
			}
		if($this->session->userdata('ux_akses') == "super_admin"){
				redirect(base_url("c_super_admin"));
		}elseif($this->session->userdata('ux_akses') == "admin"){
			redirect(base_url("c_admin"));
		}elseif($this->session->userdata('ux_akses') == "member"){
			redirect(base_url("c_member"));
		}
			
		}else{
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}

	public function logout(){ 
		$this->session->set_flashdata('response', 'Logout Successful');
		$this->session->sess_destroy();
		return redirect('c_login');
	}
}
?>