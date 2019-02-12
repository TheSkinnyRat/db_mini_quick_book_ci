<?php
	include ('header_sa.php');
?>
<div id="main">
	<div class="container">
	<h1><center>HISTORY PENDAFTARAN</center></h1>
<center>
<table class="table table-striped table-hover">
	<tr>
		<th>NO</th>
		<th>Keterangan</th>
		<th>Waktu</th>
		<th>Data</th>
	</tr>
	<?php
	$no = 1;
	foreach ($tbl_log_daftar as $u) {
	{
	?>
		<tr>
			<td><?php echo $no;  ?></td>
			<td><?php echo $u->ket ?></td>
			<td><?php echo $u->datetime  ?></td>
			<td><?php echo $u->data  ?></td>
			
		</tr>
		<?php
$no++ ;
	}
	}
	?>
</table>
	</div>
</div>
<?php
	include ('footer.php');
?>