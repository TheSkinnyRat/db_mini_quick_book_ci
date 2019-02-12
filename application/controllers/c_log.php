<?php 
class c_log extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('m_log');
		
		if($this->session->userdata('ux_akses') != "super_admin"){ ?>
			<script>alert("Anda Bukan SUPER ADMIN.!");
			document.location= "<?php echo base_url('c_login') ?>"</script>
		<?php
		}
		
	}
 
	function index(){
		$data['tbl_log'] = $this->m_log->tampil_log()->result();
		$this->load->view('crud/v_log',$data);
	}

	public function log_daftar(){
		$data['tbl_log_daftar'] = $this->m_log->log_daftar()->result();
		$this->load->view('v_log_daftar',$data);
	}
}