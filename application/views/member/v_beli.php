<?php
	include ('header_m.php');
?>
<div id="main">
	<div class="container">
<?php echo form_open('member/c_member/do_beli', ['class'=>'form-horizontal']); ?>
<?php
foreach ($tbl_barang as $u){
?>


<input type="hidden" name="kd_pembelian" value="">
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
		    	<label class="control-label col-lg-4" for="pembeli">KODE BARANG :</label>
		    	<div class="col-lg-8">
		    		<?php echo form_input(['name'=>'pembeli', 'readonly'=>'true', 'class'=>'form-control', 'placeholder'=>'Masukan Kode Barang', 'value'=>set_value('ux_user', $this->session->userdata('ux_user'))]); ; ?>
		    	</div>
		    </div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
		    	<label class="control-label col-lg-4" for="kd_barang">KODE BARANG :</label>
		    	<div class="col-lg-8">
		    		<?php echo form_input(['name'=>'kd_barang', 'readonly'=>'true', 'class'=>'form-control', 'placeholder'=>'Masukan Kode Barang', 'value'=>set_value('kd_barang', $u->kd_barang)]); ; ?>
		    	</div>
		    </div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
		    	<label class="control-label col-lg-4" for="deskripsi_barang">DESKRIPSI BARANG :</label>
		    	<div class="col-lg-8">
		    		<?php echo form_input(['name'=>'deskripsi_barang', 'readonly'=>'true', 'class'=>'form-control', 'placeholder'=>'Masukan Deskripsi Barang', 'value'=>set_value('deskripsi_barang', $u->deskripsi_barang)]); ; ?>
		    	</div>
		    </div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
		    	<label class="control-label col-lg-4" for="spesifikasi_barang">SPESIFIKASI BARANG :</label>
		    	<div class="col-lg-8">
		    		<?php echo form_input(['name'=>'spesifikasi_barang', 'readonly'=>'true', 'class'=>'form-control', 'placeholder'=>'Masukan Spesifikasi Barang', 'value'=>set_value('spesifikasi_barang', $u->spesifikasi_barang)]); ; ?>
		    	</div>
		    </div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
		    	<label class="control-label col-lg-4" for="stock">STOCK :</label>
		    	<div class="col-lg-8">
		    		<?php echo form_input(['name'=>'stock', 'readonly'=>'true', 'class'=>'form-control', 'placeholder'=>'Masukan Stock', 'value'=>set_value('stock', $u->stock)]); ; ?>
		    	</div>
		    </div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
		    	<label class="control-label col-lg-4" for="harga_satuan">HARGA SATUAN :</label>
		    	<div class="col-lg-8">
		    		<?php echo form_input(['name'=>'harga_satuan', 'id'=>'no1', 'readonly'=>'true', 'class'=>'form-control', 'placeholder'=>'Masukan Harga Jual', 'value'=>set_value('hrg_jual', $u->hrg_jual)]); ?>
		    	</div>
		    </div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
		    	<label class="control-label col-lg-4" for="diskon">DISKON :</label>
		    	<div class="col-lg-8">
		    		<?php echo form_input(['name'=>'diskon', 'id'=>'no3', 'readonly'=>'true', 'class'=>'form-control', 'placeholder'=>'Masukan Diskon', 'value'=>set_value('diskon', $u->diskon)]); ; ?>
		    	</div>
		    </div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label class="control-label col-lg-4" for="jumlah">JUMLAH BELI :</label>
				<div class="col-lg-8">
					<input type="number" class="form-control" id="no2" onKeyUp="hitung1()" name="jumlah" required><br>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label class="control-label col-lg-4" for="jumlah"><font color="#FF0004">HARGA TOTAL 	: </font></label>
				<div class="col-lg-8">
					<input type="text" class="form-control" id="no4" name="harga_total" readonly><br>
				</div>
			</div>
		</div>
	</div>
<button type="submit" style="width: 350" name="submit" class="btn btn-primary btn-lg btn-block">BELI</button>
<script>  
    
function hitung1() {
      var nomor1 = document.getElementById('no1').value;
      var nomor2 = document.getElementById('no2').value;
      var nomor3 = document.getElementById('no3').value;
      var ttl_diskon = parseInt(nomor1) * parseFloat(nomor3) /100;
      var ttl_harga = parseInt(nomor1) - parseFloat(ttl_diskon);
      var result = parseFloat(ttl_harga) * parseFloat(nomor2);
      if (!isNaN(result)) {
         document.getElementById('no4').value = result;
      }
}
</script>
<?php } ?>
<?php
	include ('footer.php');
?>