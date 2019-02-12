<?php
	include ('header_sa.php');
?>
<div id="main">
	<div class="container">
		<legend>Tambah Data</legend>
<?php echo form_open('c_crud/do_tambah', ['class'=>'form-horizontal']); ?>

	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
		    	<label class="control-label col-lg-4" for="kd_barang">KODE BARANG :</label>
		    	<div class="col-lg-8">
		    		<?php echo form_input(['name'=>'kd_barang', 'type' => 'number', 'class'=>'form-control', 'placeholder'=>'Masukan Kode Barang', 'required'=>'true','value'=>set_value('kd_barang')]); ; ?>
		    	</div>
		    </div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
		    	<label class="control-label col-lg-4" for="deskripsi_barang">DESKRIPSI BARANG :</label>
		    	<div class="col-lg-8">
		    		<?php echo form_input(['name'=>'deskripsi_barang', 'class'=>'form-control', 'placeholder'=>'Masukan Deskripsi Barang', 'required'=>'true', 'value'=>set_value('deskripsi_barang')]); ; ?>
		    	</div>
		    </div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
		    	<label class="control-label col-lg-4" for="spesifikasi_barang">SPESIFIKASI BARANG :</label>
		    	<div class="col-lg-8">
		    		<?php echo form_input(['name'=>'spesifikasi_barang', 'class'=>'form-control', 'placeholder'=>'Masukan Spesifikasi Barang', 'required'=>'true', 'value'=>set_value('spesifikasi_barang')]); ; ?>
		    	</div>
		    </div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
		    	<label class="control-label col-lg-4" for="stock">STOCK :</label>
		    	<div class="col-lg-8">
		    		<?php echo form_input(['name'=>'stock', 'type' => 'number', 'class'=>'form-control', 'placeholder'=>'Masukan Stock', 'required'=>'true', 'value'=>set_value('stock')]); ; ?>
		    	</div>
		    </div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
		    	<label class="control-label col-lg-4" for="hrg_modal">HARGA MODAL :</label>
		    	<div class="col-lg-8">
		    		<?php echo form_input(['name'=>'hrg_modal', 'type' => 'number', 'class'=>'form-control', 'placeholder'=>'Masukan Harga Jual', 'required'=>'true', 'value'=>set_value('hrg_modal')]); ; ?>
		    	</div>
		    </div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
		    	<label class="control-label col-lg-4" for="hrg_jual">HARGA JUAL :</label>
		    	<div class="col-lg-8">
		    		<?php echo form_input(['name'=>'hrg_jual', 'type' => 'number', 'class'=>'form-control', 'placeholder'=>'Masukan Harga Jual', 'required'=>'true', 'value'=>set_value('hrg_jual')]); ; ?>
		    	</div>
		    </div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
		    	<label class="control-label col-lg-4" for="diskon">DISKON :</label>
		    	<div class="col-lg-8">
		    		<?php echo form_input(['name'=>'diskon', 'type' => 'number', 'class'=>'form-control', 'placeholder'=>'Masukan Diskon', 'required'=>'true', 'value'=>set_value('diskon')]); ; ?>
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

						<?php $status = array('0', '1'); ?>
						<?php echo form_dropdown(['name'=>'status', 'class'=>'form-control'], $options); ?>
					</div>
		    </div>
		</div>
	</div>
	<?php echo form_submit(['value'=>'Submit', 'class'=>'btn btn-primary']) ; ?>
	</div>
</div>
<?php
	include ('footer.php');
?>