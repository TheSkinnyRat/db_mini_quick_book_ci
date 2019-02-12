<?php 
class c_crud extends CI_Controller{
 
	public function __construct(){
		parent::__construct();		
		$this->load->model('m_crud');
		
		if($this->session->userdata('ux_akses') != "super_admin" && $this->session->userdata('ux_akses') != "admin" ){ ?>
			<script>alert("Anda Bukan ADMIN/SUPER ADMIN.!");
			document.location= "<?php echo base_url('c_login') ?>"</script>
		<?php
		}
		
	}
 
	public function index(){
		$data['tbl_barang'] = $this->m_crud->tampil_data()->result();
		$this->load->view('crud/v_tampil',$data);
	}
 
	public function tambah(){
		$this->load->view('crud/v_tambah');
	}
	
	public function do_tambah(){
		$kd_barang = $this->input->post('kd_barang');
		$deskripsi_barang = $this->input->post('deskripsi_barang');
		$spesifikasi_barang = $this->input->post('spesifikasi_barang');
		$stock = $this->input->post('stock');
		$hrg_modal = $this->input->post('hrg_modal');
		$hrg_jual = $this->input->post('hrg_jual');
		$diskon = $this->input->post('diskon');
		$status = $this->input->post('status');
 	
		$data = array(
			'kd_barang' => $kd_barang,
			'deskripsi_barang' => $deskripsi_barang,
			'spesifikasi_barang' => $spesifikasi_barang,
			'stock' => $stock,
			'hrg_modal' => $hrg_modal,
			'hrg_jual' => $hrg_jual,
			'diskon' => $diskon,
			'status' => $status,
			);
		$this->m_crud->input_data($data); 
		$this->session->set_flashdata('response', 'Barang Berhasil Ditambah');
		return redirect('c_crud');	
			}
	
	public function hapus($kd_barang){
		$where = array('kd_barang' => $kd_barang);
		$this->m_crud->hapus_data($where);
		$this->session->set_flashdata('response', 'Barang Berhasil Dihapus');
		return redirect('c_crud');	
	}
	
	public function edit($kd_barang){
	$where = array('kd_barang' => $kd_barang);
	$data['tbl_barang'] = $this->m_crud->edit_data($where)->result();
	$this->load->view('crud/v_edit',$data);
	}
	
	public function do_edit(){
		$kd_barang 				= $this->input->post('kd_barang');
		$deskripsi_barang 		= $this->input->post('deskripsi_barang');
		$spesifikasi_barang 	= $this->input->post('spesifikasi_barang');
		$stock 					= $this->input->post('stock');
		$hrg_modal 				= $this->input->post('hrg_modal');
		$hrg_jual 				= $this->input->post('hrg_jual');
		$diskon 				= $this->input->post('diskon');
		$status 				= $this->input->post('status');
 	
	$data = array(
			'kd_barang' 			=> $kd_barang,
			'deskripsi_barang' 		=> $deskripsi_barang,
			'spesifikasi_barang'	=> $spesifikasi_barang,
			'stock' 				=> $stock,
			'hrg_modal' 			=> $hrg_modal,
			'hrg_jual' 				=> $hrg_jual,
			'diskon' 				=> $diskon,
			'status' 				=> $status,
			);
 
	$where = array(
		'kd_barang' => $kd_barang
	);
	$this->m_crud->update_data($where,$data);
	$this->session->set_flashdata('response', 'Barang Berhasil Diubah');
		return redirect('c_crud');	
	}
	public function cari(){
		$cari = $this->input->get('cari');
		$data['tbl_barang'] = $this->m_crud->cari($cari)->result();
		$this->load->view('crud/v_tampil',$data);
	}
}
?>