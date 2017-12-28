<?php

	echo "<div class='container'>
			<div class='container-content' style='min-height:50px;'>
				<div class='header-content'>
					<h4><b>
					PEMBAYARAN
					</b></h4>
				</div>
			</div>

			<div class='container-content' style='min-height:450px;'>
				<div class='body-content'>
					<form class='form-horizontal' method='POST' action='".base_url()."index.php/iuran/proses'>
					    <div class='form-group'>
						  	<label for='inputId' class='control-label col-xs-2'>Nama Anggota </label>
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
					        <label for='inputBesaranPembayaran' class='control-label col-xs-2'> Jumlah Iuran</label>
					        <div class='col-xs-10'>
					            <input type='number' class='form-control' name='inputBesaranPembayaran' id='inputBesaranPembayaran' placeholder='Ex : 150000'>
					        </div>
					    </div>
			            <div class='form-group'>
			                <label for='inputDate' class='control-label col-xs-2'>Waktu Pembayaran</label>
			                <div class='input-group date form_date col-xs-10' data-date-format='dd MM yyyy' data-link-field='inputDate' style='padding-left:15px;padding-right:15px;'>
			                    <input type='text' size='16'class='form-control' value='' readonly>
			                    <span class='input-group-addon'><span class='glyphicon glyphicon-remove'></span></span>
								<span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span>
			                </div>
			                <input type='hidden' name='inputWaktuPembayaran' id='inputDate' value='' />
			            </div>
    
					    <div class='form-group'>
					        <div class='col-xs-offset-5 col-xs-7' >
					            <button type='submit' class='btn btn-primary' style='min-width: 20%;'> Bayar </button>
					        </div>
					    </div>
					</form>

				</div>
			</div>
		</div>
	";
?>
