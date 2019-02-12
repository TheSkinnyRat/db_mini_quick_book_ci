<?php

class C_admin extends CI_Controller{

	function __construct(){
		parent::__construct();

		if($this->session->userdata('ux_akses') != "admin"){ ?>
			<script>alert("Anda Bukan ADMIN.!");
			document.location= "<?php echo base_url('c_login') ?>"</script>
		<?php
		}
	}

	function index(){
		$this->load->view('v_admin');
	}
}
