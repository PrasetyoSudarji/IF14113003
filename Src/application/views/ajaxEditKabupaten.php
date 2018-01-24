<?php

	if($infoKabupaten==null){
		echo "KOSONG";
	}else{
		foreach ($infoKabupaten as $key => $value) {
			# code...
		
		echo "<form class='form-horizontal' method='POST' action='".base_url()."index.php/kabupatenkota/updateKabupaten'>
	       	<input type='hidden' readonly class='form-control' name='inputKode' id='inputKode' value='".$value['kode_provinsi']."'>
			<div class='form-group'>
		        <label for='inputNamaKabupaten' class='control-label col-xs-2'> Nama Kabupaten</label>
		        <div class='col-xs-10'>
		            <input type='text' class='form-control' name='inputNamaKabupaten' id='inputNamaKabupaten' value='".$value['nama_kabupaten_kota']."'>
		        </div>
		    </div>
		    
			<div class='form-group'>
			  	<label for='inputProvinsi' class='control-label col-xs-2'> Nama Provinsi </label>
			  	<div class='col-xs-10'>
			  	<select class='form-control' id='inputProvinsi' name='inputProvinsi'>";
			  		foreach ($listProvinsi as $key => $value2) {
			  			# code...
			  			if($value2['kode_provinsi'] == $value['kode_provinsi']){
			  				echo "<option value='".$value2['kode_provinsi']."' selected>".$value2['nama_provinsi']."</option>";
			  			}else{
			  				echo "<option value='".$value2['kode_provinsi']."'>".$value2['nama_provinsi']."</option>";
			  			}
			  			
			  		}
			  	echo "</select>
			  	</div>
			</div>

		    <div class='form-group'>
		        <div class='col-xs-offset-5 col-xs-7' >
		            <button type='submit' class='btn btn-primary' style='min-width: 20%;'> Update </button>
		        </div>
		    </div>
		</form>
		";
	}

	}
	
?>
