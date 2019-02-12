<?php 
class c_register extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('m_crud');
		
	}
	

	public function index(){
		$this->load->view('crud/v_register');
	}
	
	public function do_register(){

		$ux_user = $this->input->post('ux_user');
		$ux_pass = md5($this->input->post('ux_pass'));
		$data = array(
				'ux_user' => $ux_user,
				'ux_pass' => md5($ux_pass),
				);	
		$this->form_validation->set_rules('ux_user', 'Username', 'required');
        $this->form_validation->set_rules('ux_pass', 'Password', 'required|md5');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if ( $this->form_validation->run() == FALSE ) {
        	$cek = $this->m_crud->cek_register(array ('ux_user' => $ux_user));
			if($cek->num_rows() > 0) {
				$this->session->set_flashdata('response', 'Register Failed. Username Anda Telah Dipakai');
	        return redirect('c_register');
	    }
		}else{
			$cek = $this->m_crud->cek_register(array ('ux_user' => $ux_user));
			if($cek->num_rows() > 0) {
				
				$this->session->set_flashdata('response', 'Register Failed. Username Anda Telah Dipakai');
			return redirect('c_register');
			}else{
				$data = $this->input->post();
            	$this->load->model('m_crud');
		    	if( $this->m_crud->do_registerRecord( $data ) ){
		          	
		   		$this->session->set_flashdata('response', 'Register Failed.');
				}else{
					
				$this->session->set_flashdata('response', 'Register Success.');
			}
				return redirect('c_login');
        }
    }
	}	
}

?>