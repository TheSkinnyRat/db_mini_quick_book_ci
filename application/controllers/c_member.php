<?php 

class C_member extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('ux_akses') != "member"){ ?>
			<script>alert("Anda Bukan MEMBER.!");
			document.location= "<?php echo base_url('c_login') ?>"</script>			
		<?php
		}
	}
 
	function index(){
		$this->load->view('v_member');
	}
}