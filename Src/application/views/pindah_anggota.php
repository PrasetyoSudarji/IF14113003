<?php

	echo "<div class='container'>
			<div class='container-content' style='min-height:50px;'>
				<div class='header-content'>
					<h4><b>
					PINDAH ANGGOTA
					</b></h4>
				</div>
			</div>

			<div class='container-content' style='min-height:450px;'>
				<div class='body-content'>
					<form class='form-horizontal' method='POST' action='".base_url()."index.php/anggota/prosesPindah'>
						
					    <div class='form-group'>
						  	<label for='inputId' class='control-label col-xs-2'> Nama Anggota </label>
						  	<div class='col-xs-10'>
						  	<select class='form-control' id='inputId' name='inputId'>";
						  		foreach ($listAnggota as $key => $value) {
						  			# code...
						  			if($value['kode_dojo'] == $_SESSION['kode_dojo'] && $value['jabatan'] == 'Anggota'){
						  				echo "<option value=".$value['id'].">".$value['nama']."</option>";
						  			}
						  		}
							    
						  	echo "</select>
						  	</div>
						</div>

						<div class='form-group'>
						  	<label for='inputDojo' class='control-label col-xs-2'> Dojo Tujuan </label>
						  	<div class='col-xs-10'>
						  	<select class='form-control' id='inputDojo' name='inputDojo'>";
						  		foreach ($listDojo as $key => $value) {
						  			# code...
						  			if($value['kode_dojo'] != $_SESSION['kode_dojo']){
						  				echo "<option value=".$value['kode_dojo'].">".$value['nama_dojo']."</option>";
						  			}
						  		}
							    
						  	echo "</select>
						  	</div>
						</div>

					    <div class='form-group'>
					        <div class='col-xs-offset-5 col-xs-7' >
					            <button type='submit' class='btn btn-primary' style='min-width: 20%;'> Send Request </button>
					        </div>
					    </div>
					</form>

				</div>
			</div>
		</div>
	";
?>
