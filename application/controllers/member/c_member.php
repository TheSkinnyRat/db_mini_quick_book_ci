<?php 
class c_member extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('m_member');
		
		if($this->session->userdata('ux_akses') != "member"){ ?>
			<script>alert("Anda Bukan Member.!");
			document.location= "<?php echo base_url('c_login') ?>"</script>
		<?php
		}
		
	}
	
	public function index(){
		$data['tbl_barang'] = $this->m_member->tampil_data()->result();
		$this->load->view('member/v_barang',$data);
	}
	
	public function beli($kd_barang){
	$where = array('kd_barang' => $kd_barang);
	$data['tbl_barang'] = $this->m_member->beli($where)->result();
	$this->load->view('member/v_beli',$data);
	}
	
	public function do_beli(){
		
		$pembeli = $this->input->post('pembeli');
		$kd_barang = $this->input->post('kd_barang');
		$deskripsi_barang = $this->input->post('deskripsi_barang');
		$spesifikasi_barang = $this->input->post('spesifikasi_barang');
		$jumlah = $this->input->post('jumlah');
		$harga_satuan = $this->input->post('harga_satuan');
		$harga_total = $this->input->post('harga_total');
		$stock = $this->input->post('stock');
		
		if ($jumlah <= 0 ) { ?>
	<script>alert("PEMBELIAN MINIMAL 1 UNIT");
			document.location='<?php echo base_url('member/c_member/beli/'.$kd_barang) ?>'</script>
<?php } else {

if ($jumlah > $stock){ ?>
	<script language="javascript">alert("STOCK KURANG");
			document.location='<?php echo base_url('member/c_member/beli/'.$kd_barang) ?>'</script>
<?php  } else {
		
		$data = array(
			'pembeli' => $pembeli,
			'kd_barang' => $kd_barang,
			'deskripsi_barang' => $deskripsi_barang,
			'spesifikasi_barang' => $spesifikasi_barang,
			'jumlah' => $jumlah,
			'harga_satuan' => $harga_satuan,
			'harga_total' => $harga_total,
			);
		$this->m_member->do_beli($data); ?>
<script>alert("Barang Dimasukkan Ke Keranjang.!");
			document.location= "<?php echo base_url('member/c_member/index') ?>"</script>	
		<?php	
			}
		}
	
	}
	
	public function keranjang(){
		$data['tbl_beli'] = $this->m_member->keranjang()->result();
		$this->load->view('member/v_keranjang',$data);
	}
	
	public function bayar($kd_pembelian){
		$where = array('kd_pembelian' => $kd_pembelian);
		$this->m_member->bayar($where); ?>
		<script>alert("Pembayaran Berhasil!");
			document.location= "<?php echo base_url('member/c_member/keranjang') ?>"</script>
	 <?php }
	
	public function log(){
		$data['tbl_log_bayar'] = $this->m_member->log()->result();
		$this->load->view('member/v_history',$data);
	}

	public function cari(){
		$cari = $this->input->get('cari');
		$data['tbl_barang'] = $this->m_member->cari($cari)->result();
		$this->load->view('member/v_barang',$data);
	}
}