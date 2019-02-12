<?php
	include ('application/views/header_m.php');
?>
<div id="main">
	<div class="container">

	<h1><center>DATA BARANG</center></h1>
		<form class="form-inline my-2 my-lg-0" action="<?php echo base_url('member/c_member/cari') ?>">
        <input class="form-control mr-sm-2" type="text" style="width: 20%" placeholder="Cari Deskrpsi Barang" name="cari">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit" style="width: 10%;">Cari</button>
    </form>
		<table class="table table-striped table-hover">
			<thead>
			<tr>
				<th>NO</th>
				<th>KODE BARANG</th>
				<th>DESKRIPSI BARANG</th>
				<th>SPESIFIKASI BARANG</th>
				<th>STOCK</th>
				<th>HARGA</th>
				<th>DISKON</th>
				<th>ACTION</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach($tbl_barang as $u)
			{
			?>
				<tr>
					<td><?php echo $no  ?></td>
					<td><?php echo $u->kd_barang  ?></td>
					<td><?php echo $u->deskripsi_barang  ?></td>
					<td><?php echo $u->spesifikasi_barang  ?></td>
					<td><?php echo $u->stock  ?></td>
					<td><?php echo $u->hrg_jual ?></td>
					<td><?php echo $u->diskon ?></td>
					<td><?php echo anchor("member/c_member/beli/{$u->kd_barang}", 'Beli', ['class'=>'btn btn-success']); ?></td>
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