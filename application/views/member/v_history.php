<?php
	include ('header_m.php');
?>
<div id="main">
	<div class="container">

<h1><center>History Pembayaran</center></h1>
<table class="table table-striped table-hover">
	<thead>
	<tr>
		<th>Detail</th>
		<th>Kode Pembelian</th>
		<th>Kode Barang</th>
		<th>Deskripsi Barang</th>
		<th>Spesifikasi Barang</th>
		<th>Jumlah</th>
		<th>Harga Satuan</th>
		<th>Harga Total</th>
	</tr>
</thead>
<tbody>
	<?php
	foreach($tbl_log_bayar as $u){
	?>
		<tr>
			<td><?php echo $u->ket  ?></td>
			<td><?php echo $u->kd_pembelian  ?></td>
			<td><?php echo $u->kd_barang  ?></td>
			<td><?php echo $u->deskripsi_barang  ?></td>
			<td><?php echo $u->spesifikasi_barang  ?></td>
			<td><?php echo $u->jumlah  ?></td>
			<td><?php echo $u->hrg_satuan ?></td>
			<td><?php echo $u->hrg_total ?></td>
		</tr>
		<?php
	} 
	?>
</tbody>
</table>
	</div>
</div>
<?php
	include ('footer.php');
?>