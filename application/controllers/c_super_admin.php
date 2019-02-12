<?php 

class C_super_admin extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('ux_akses') != "super_admin"){ ?>
			<script>alert("Anda Bukan SUPER ADMIN.!");
			document.location= "<?php echo base_url('c_login') ?>"</script>			
		<?php
		}
	}
 
	public function index(){
		$this->load->view('v_super_admin');
	}
}