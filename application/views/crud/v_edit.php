<?php
	include ('header_sa.php');
?>
<div id="main">
	<div class="container">
		<legend>Edit Data</legend>
<?php echo form_open('c_crud/do_edit', ['class'=>'form-horizontal']); ?>
<?php
foreach($tbl_barang as $u ) {
?>
<input type="hidden" name="kd_barang" value="<?php echo $u->kd_barang ?>">
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
		    	<label class="control-label col-lg-4" for="kd_barang">KODE BARANG :</label>
		    	<div class="col-lg-8">
		    		<?php echo form_input(['name'=>'kd_barang', 'type' => 'number', 'readonly'=>'true', 'class'=>'form-control', 'placeholder'=>'Masukan Kode Barang', 'value'=>set_value('kd_barang', $u->kd_barang)]); ; ?>
		    	</div>
		    </div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
		    	<label class="control-label col-lg-4" for="deskripsi_barang">DESKRIPSI BARANG :</label>
		    	<div class="col-lg-8">
		    		<?php echo form_input(['name'=>'deskripsi_barang', 'class'=>'form-control', 'placeholder'=>'Masukan Deskripsi Barang', 'value'=>set_value('deskripsi_barang', $u->deskripsi_barang)]); ; ?>
		    	</div>
		    </div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
		    	<label class="control-label col-lg-4" for="spesifikasi_barang">SPESIFIKASI BARANG :</label>
		    	<div class="col-lg-8">
		    		<?php echo form_input(['name'=>'spesifikasi_barang', 'class'=>'form-control', 'placeholder'=>'Masukan Spesifikasi Barang', 'value'=>set_value('spesifikasi_barang', $u->spesifikasi_barang)]); ; ?>
		    	</div>
		    </div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
		    	<label class="control-label col-lg-4" for="stock">STOCK :</label>
		    	<div class="col-lg-8">
		    		<?php echo form_input(['name'=>'stock', 'type' => 'number', 'class'=>'form-control', 'placeholder'=>'Masukan Stock', 'value'=>set_value('stock', $u->stock)]); ; ?>
		    	</div>
		    </div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
		    	<label class="control-label col-lg-4" for="hrg_modal">HARGA MODAL :</label>
		    	<div class="col-lg-8">
		    		<?php echo form_input(['name'=>'hrg_modal', 'type' => 'number', 'class'=>'form-control', 'placeholder'=>'Masukan Harga Jual', 'value'=>set_value('hrg_modal', $u->hrg_modal)]); ; ?>
		    	</div>
		    </div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
		    	<label class="control-label col-lg-4" for="hrg_jual">HARGA JUAL :</label>
		    	<div class="col-lg-8">
		    		<?php echo form_input(['name'=>'hrg_jual', 'type' => 'number', 'class'=>'form-control', 'placeholder'=>'Masukan Harga Jual', 'value'=>set_value('hrg_jual', $u->hrg_jual)]); ?>
		    	</div>
		    </div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
		    	<label class="control-label col-lg-4" for="diskon">DISKON :</label>
		    	<div class="col-lg-8">
		    		<?php echo form_input(['name'=>'diskon', 'type' => 'number', 'class'=>'form-control', 'placeholder'=>'Masukan Diskon', 'value'=>set_value('diskon', $u->diskon)]); ; ?>
		    	</div>
		    </div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
		    	<label class="control-label col-lg-10" for="status">STATUS :</label>
					<div class="col-lg-8">
	  					<?php $options = array(
	        				'0'     => 'Sembunyikan',
	        				'1'     => 'Tampilkan',
							); ?>

						<?php $status = array($u->status); ?>
						<?php echo form_dropdown(['name'=>'status', 'class'=>'form-control'], $options, $status); ?>
					</div>
		    </div>
		</div>
	</div>
<?php } ?>
<?php echo form_submit(['value'=>'Edit', 'class'=>'btn btn-primary']) ; ?>
	</div>
</div>
<?php
	include ('footer.php');
?>