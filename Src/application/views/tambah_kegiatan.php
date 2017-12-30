<?php

	echo "<div class='container'>
			<div class='container-content' style='min-height:50px;'>
				<div class='header-content'>
					<h4><b>
					TAMBAH KEGIATAN
					</b></h4>
				</div>
			</div>

			<div class='container-content' style='min-height:450px;'>
				<div class='body-content'>
					<form class='form-horizontal' method='POST' action='".base_url()."index.php/anggota/proses'>
						<div class='form-group'>
					        <label for='inputNama' class='control-label col-xs-2'> Nama Kegiatan</label>
					        <div class='col-xs-10'>
					            <input type='text' class='form-control' name='inputNama' id='inputNama' placeholder='Ex : Latihan Rutin'>
					        </div>
					    </div>
					    <div class='form-group'>
						  	<label for='inputId' class='control-label col-xs-2'> Penanggung Jawab </label>
						  	<div class='col-xs-10'>
						  	<select class='form-control' id='inputId' name='inputId'>";
						  		foreach ($listAnggota as $key => $value) {
						  			# code...
					  				if($value['kode_dojo'] == $_SESSION['kode_dojo']){
					  					echo "<option value='".$value['id']."'>".$value['nama']."</option>";
					  				}
						  		}
							    
						  	echo "</select>
						  	</div>
						</div>
					    <div class='form-group'>
						  	<label for='inputJenis' class='control-label col-xs-2'> Jenis Kegiatan </label>
						  	<div class='col-xs-10'>
						  	<select class='form-control' id='inputJenis' name='inputJenis'>";
						  		$totalJenis = count($listJenis);
						  		for($i = 0;$i<$totalJenis;$i++) {
						  			# code...
				  					echo "<option value='".$listJenis[$i]."'>".$listJenis[$i]."</option>";
						  		}
							    
						  	echo "</select>
						  	</div>
						</div>
						<div class='form-group'>
			                <label for='inputTime1' class='control-label col-xs-2'>Waktu Mulai </label>
			                <div class='input-group date form_datetime col-xs-10' data-date-format='dd MM yyyy - HH:ii p' data-link-field='inputTime1' style='padding-left:15px;padding-right:15px;'>
			                    <input type='text' size='16'class='form-control' value='' readonly>
			                    <span class='input-group-addon'><span class='glyphicon glyphicon-remove'></span></span>
								<span class='input-group-addon'><span class='glyphicon glyphicon-th'></span></span>
			                </div>
			                <input type='hidden' name='inputWaktuMulai' id='inputTime1' value='' />
			            </div>
			            <div class='form-group'>
			                <label for='inputTime2' class='control-label col-xs-2'>Waktu Selesai </label>
			                <div class='input-group date form_datetime col-xs-10' data-date-format='dd MM yyyy - HH:ii p' data-link-field='inputTime2' style='padding-left:15px;padding-right:15px;'>
			                    <input type='text' size='16'class='form-control' value='' readonly>
			                    <span class='input-group-addon'><span class='glyphicon glyphicon-remove'></span></span>
								<span class='input-group-addon'><span class='glyphicon glyphicon-th'></span></span>
			                </div>
			                <input type='hidden' name='inputWaktuSelesai' id='inputTime2' value='' />
			            </div>
					    <div class='form-group'>
						  	<label for='inputDojo' class='control-label col-xs-2'>Nama Dojo </label>
						  	<div class='col-xs-10'>
						  	<select class='form-control' id='inputDojo' name='inputDojo'>";
							    foreach ($listDojo as $key => $value) {
						  			# code...
				  					echo "<option value='".$value['kode_dojo']."'>".$value['nama_dojo']."</option>";
						  		}
						  	echo "</select>
						  	</div>
						</div>
						<div class='form-group'>
						  	<label for='inputLevel' class='control-label col-xs-2'> Level Kegiatan </label>
						  	<div class='col-xs-10'>
						  	<select class='form-control' id='inputLevel' name='inputLevel'>";
							    $totalLevel = count($listLevel);
						  		for($i = 0;$i<$totalLevel;$i++) {
						  			# code...
				  					echo "<option value='".$listLevel[$i]."'>".$listLevel[$i]."</option>";
						  		}
						  	echo "</select>
						  	</div>
						</div>
						<div class='form-group'>
					        <label for='inputTempat' class='control-label col-xs-2'> Tempat Kegiatan</label>
					        <div class='col-xs-10'>
					            <input type='text' class='form-control' name='inputTempat' id='inputTempat' placeholder='Ex : Lapangan Basket ITERA'>
					        </div>
					    </div>
					    <div class='form-group'>
					        <label for='inputBiaya' class='control-label col-xs-2'> Biaya Kegiatan</label>
					        <div class='col-xs-10'>
					            <input type='number' class='form-control' name='inputBiaya' id='inputBiaya' placeholder='Ex : 50000'>
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
