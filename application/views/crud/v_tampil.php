<?php
	include ('header_sa.php');
?>
<div id="main">
	<?php if( $error = $this->session->flashdata('response') ): ?>
        <div class="alert alert-success alert-dismissable">
<!--            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>-->
            <?php echo $error; ?>
        </div>
    <?php endif; ?>
	<div class="container">
	<div class="row">
		<h1><center>Data Barang</center></h1>
		<div class="col-lg-12">
			<div style="float: right">
			<?php echo anchor("c_crud/tambah", 'Tambah', ['class'=>'btn btn-primary']); ?>
			</div>
			<form class="form-inline my-2 my-lg-0" action="<?php echo base_url('c_crud/cari') ?>">
        	<input class="form-control mr-sm-2" type="text" style="width: 20%" placeholder="Cari Deskripsi Barang" name="cari">
        	<button class="btn btn-secondary my-2 my-sm-0" type="submit" style="width: 10%;">Cari</button>
    		</form>
		</div>
	</div>
		<table class="table table-striped table-hover">
		  <thead>
		    <tr>
				<th>Kode Barang</th>
				<th>Deskripsi Barang</th>
				<th>Spesifikasi Barang</th>
				<th>Stock</th>
				<th>Harga Modal</th>
				<th>Harga Jual</th>
				<th>Diskon</th>
				<th>Status</th>
				<th colspan="2">Action</th>
			</tr>
		  </thead>
		  <tbody>
		    <?php
			$no = 1;
			foreach($tbl_barang as $u){
			?>
				<tr>
					<td><?php echo $u->kd_barang;  ?></td>
					<td><?php echo $u->deskripsi_barang  ?></td>
					<td><?php echo $u->spesifikasi_barang  ?></td>
					<td><?php echo $u->stock  ?></td>
					<td><?php echo $u->hrg_modal ?></td>
					<td><?php echo $u->hrg_jual ?></td>
					<td><?php echo $u->diskon?></td>
					<td><?php echo $u->status ?></td>
					<td><?php echo anchor("c_crud/edit/{$u->kd_barang}", 'Edit', ['class'=>'btn btn-info']); ?></td>
					<td><?php echo anchor("c_crud/hapus/{$u->kd_barang}", 'Hapus', ['class'=>'btn btn-danger']); ?></td>
				</tr>
				<?php
			
			$no++;
			} 
			?>
		  </tbody>
		</table>
	</div>
</div>
<?php
	include ('footer.php');
?>