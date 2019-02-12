<?php
	include ('header_m.php');
?>
<div id="main">
	<div class="container">
		<h1><center>KERANJANG</center></h1>
		<table class="table table-striped table-hover">
			<thead>
			<tr>
				<th>Kode Pembelian</th>
				<th>Kode Barang</th>
				<th>Nama Pembeli</th>
				<th>Deskripsi Barang</th>
				<th>Spesifikasi Barang</th>
				<th>jumlah</th>
				<th>Harga Satuan</th>
				<th>Harga Total</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach ($tbl_beli as $u){
			?>
				<tr>
					<td><?php echo $u->kd_pembelian  ?></td>
					<td><?php echo $u->kd_barang  ?></td>
					<td><?php echo $u->pembeli  ?></td>
					<td><?php echo $u->deskripsi_barang  ?></td>
					<td><?php echo $u->spesifikasi_barang  ?></td>
					<td><?php echo $u->jumlah  ?></td>
					<td><?php echo $u->harga_satuan ?></td>
					<td><?php echo $u->harga_total ?></td>
					<td><?php echo anchor("member/c_member/bayar/{$u->kd_pembelian}", 'Bayar', ['class'=>'btn btn-info']); ?></td>
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