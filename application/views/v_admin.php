<?php
	include ('header_sa.php');
?>
<div id="main">
	<div class="container">

	<h1>Selamat Datang...</h1>
	<h2><strong><font color=blue><?php echo $this->session->userdata('ux_user'); ?></font></strong></h2>

	</div>
</div>
<?php
	include ('footer.php');
?>
