<?php

	if($infoProvinsi==null){
		echo "KOSONG";
	}else{
		foreach ($infoProvinsi as $key => $value) {
			# code...
		
		echo "<form class='form-horizontal' method='POST' action='".base_url()."index.php/provinsi/updateProvinsi'>
	       	<input type='hidden' readonly class='form-control' name='inputKode' id='inputKode' value='".$value['kode_provinsi']."'>
			<div class='form-group'>
		        <label for='inputNamaProvinsi' class='control-label col-xs-2'> Nama Provinsi</label>
		        <div class='col-xs-10'>
		            <input type='text' class='form-control' name='inputNamaProvinsi' id='inputNamaProvinsi' value='".$value['nama_provinsi']."'>
		        </div>
		    </div>
		    
			<div class='form-group'>
			  	<label for='inputNegara' class='control-label col-xs-2'> Nama Negara </label>
			  	<div class='col-xs-10'>
			  	<select class='form-control' id='inputNegara' name='inputNegara'>";
			  		foreach ($listNegara as $key => $value2) {
			  			# code...
			  			if($value2['kode_negara'] == $value['kode_negara']){
			  				echo "<option value='".$value2['kode_negara']."' selected>".$value2['nama_negara']."</option>";
			  			}else{
			  				echo "<option value='".$value2['kode_negara']."'>".$value2['nama_negara']."</option>";
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
