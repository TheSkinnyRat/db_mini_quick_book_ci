<?php
	include ('header_sa.php');
?>
<div id="main">
	<div class="container">
	<h1><center>HISTORY</center></h1>

		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>NO</th>
					<th>Keterangan</th>
					<th>Waktu</th>
					<th>User</th>
					<th>Data Lama</th>
					<th>Data Baru</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($tbl_log as $u) {
				{
				?>
					<tr>
						<td><?php echo $no;  ?></td>
						<td><?php echo $u->ket ?></td>
						<td><?php echo $u->datetime  ?></td>
						<td><?php echo $u->user  ?></td>
						<td><?php echo $u->old_data ?></td>
						<td><?php echo $u->new_data ?></td>
						
					</tr>
					<?php
			$no++ ;
				}
				}
				?>
			</tbody>
		</table>
			
        </div>
    </div>

<?php
    include('application/views/footer.php');
?>