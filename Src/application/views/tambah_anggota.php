<?php

	echo "<div class='container'>
			<div class='container-content' style='min-height:50px;'>
				<div class='header-content'>
					<h4><b>
					TAMBAH ANGGOTA
					</b></h4>
				</div>
			</div>

			<div class='container-content' style='min-height:450px;'>
				<div class='body-content'>
					<form class='form-horizontal' method='POST' action='".base_url()."index.php/anggota/proses'>
						<div class='form-group'>
					        <label for='inputNama' class='control-label col-xs-2'> Nama Anggota</label>
					        <div class='col-xs-10'>
					            <input type='text' class='form-control' name='inputNama' id='inputNama' placeholder='Ex : Jeff Dean'>
					        </div>
					    </div>
					    <div class='form-group'>
						  	<label for='inputJabatan' class='control-label col-xs-2'> Jabatan Anggota </label>
						  	<div class='col-xs-10'>
						  	<select class='form-control' id='inputJabatan' name='inputJabatan'>";
						  		$totalJabatan = count($listJabatan);
						  		for($i = 0;$i<$totalJabatan;$i++) {
						  			# code...
				  					echo "<option value='".$listJabatan[$i]."'>".$listJabatan[$i]."</option>";
						  		}
							    
						  	echo "</select>
						  	</div>
						</div>
					    <div class='form-group'>
					        <label for='inputUsername' class='control-label col-xs-2'> Username </label>
					        <div class='col-xs-10'>
					            <input type='text' class='form-control' name='inputUsername' id='inputUsername' placeholder='Username'>
					        </div>
					    </div>

					    <div class='form-group'>
					        <label for='inputPassword' class='control-label col-xs-2'> Password </label>
					        <div class='col-xs-10'>
					            <input type='password' class='form-control' name='inputPassword' id='inputPassword' placeholder='Password'>
					        </div>
					    </div>
					    <div class='form-group'>
					        <label for='inputPasswordConfirm' class='control-label col-xs-2'> Confirm Password </label>
					        <div class='col-xs-10'>
					            <input type='password' class='form-control' name='inputPasswordConfirm' id='inputPasswordConfirm' placeholder='Password'>
					        </div>
					    </div>
					    <div class='form-group'>
						  	<label for='inputDojo' class='control-label col-xs-2'>Nama Dojo </label>
						  	<div class='col-xs-10'>
						  	<select class='form-control' id='inputDojo' name='inputDojo'>";
							    foreach ($dataDojo as $key => $value) {
						  			# code...
				  					echo "<option value='".$value['kode_dojo']."'>".$value['nama_dojo']."</option>";
						  		}
						  	echo "</select>
						  	</div>
						</div>
						<div class='form-group'>
						  	<label for='inputTingkatan' class='control-label col-xs-2'> Tingkatan </label>
						  	<div class='col-xs-10'>
						  	<select class='form-control' id='inputTingkatan' name='inputTingkatan'>";
							    $totalTingkatan = count($listTingkatan);
						  		for($i = 0;$i<$totalTingkatan;$i++) {
						  			# code...
				  					echo "<option value='".$listTingkatan[$i]."'>".$listTingkatan[$i]."</option>";
						  		}
						  	echo "</select>
						  	</div>
						</div>
					    <div class='form-group'>
						  	<label for='inputAtlit' class='control-label col-xs-2'> Atlit </label>
						  	<div class='col-xs-10'>
						  	<select class='form-control' id='inputAtlit' name='inputAtlit'>";
							    $totalAtlit = count($listAtlit);
						  		for($i = 0;$i<$totalAtlit;$i++) {
						  			# code...
				  					echo "<option value='".$listAtlit[$i]."'>".$listAtlit[$i]."</option>";
						  		}
						  	echo "</select>
						  	</div>
						</div>
						<div class='form-group'>
						  	<label for='inputJuri' class='control-label col-xs-2'> Juri </label>
						  	<div class='col-xs-10'>
						  	<select class='form-control' id='inputJuri' name='inputJuri'>";
							    $totalJuri = count($listJuri);
						  		for($i = 0;$i<$totalJuri;$i++) {
						  			# code...
				  					echo "<option value='".$listJuri[$i]."'>".$listJuri[$i]."</option>";
						  		}
						  	echo "</select>
						  	</div>
						</div>
    
					    <div class='form-group'>
					        <div class='col-xs-offset-5 col-xs-7' >
					            <button type='submit' class='btn btn-primary' style='min-width: 20%;'> Input </button>
					        </div>
					    </div>
					</form>

				</div>
			</div>
		</div>
	";
?>
