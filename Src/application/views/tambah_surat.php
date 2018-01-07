<?php

	echo "<div class='container'>
			<div class='container-content' style='min-height:50px;'>
				<div class='header-content'>
					<h4><b>
					TAMBAH SURAT
					</b></h4>
				</div>
			</div>

			<div class='container-content' style='min-height:450px;'>
				<div class='body-content'>
					<form class='form-horizontal' method='POST' action='".base_url()."index.php/suratEdaran/prosesSurat'>
						<div class='form-group'>
					        <label for='inputJudul' class='control-label col-xs-2'> Judul Surat</label>
					        <div class='col-xs-10'>
					            <input type='text' class='form-control' name='inputJudul' id='inputJudul' placeholder='Ex : Undangan'>
					        </div>
					    </div>
					    <div class='form-group'>
					        <label for='inputPerihal' class='control-label col-xs-2'> Perihal</label>
					        <div class='col-xs-10'>
					            <input type='text' class='form-control' name='inputPerihal' id='inputPerihal' placeholder='Ex : Ujian Kenaikan Tingkat'>
					        </div>
					    </div>
					    <div class='form-group'>
						  	<label for='inputStatus' class='control-label col-xs-2'> Status </label>
						  	<div class='col-xs-10'>
						  	<select class='form-control' id='inputStatus' name='inputStatus'>";
						  		$totalStatus = count($listStatus);
						  		for($i = 0;$i<$totalStatus;$i++) {
						  			# code...
				  					echo "<option value='".$listStatus[$i]."'>".$listStatus[$i]."</option>";
						  		}
							    
						  	echo "</select>
						  	</div>
						</div>

						<div class='form-group'>
						  	<label for='inputPenerima' class='control-label col-xs-2'> Penerima </label>
						  	<div class='col-xs-10'>
						  	<select class='form-control' id='inputPenerima' name='inputPenerima'>";
						  		foreach ($listAnggota as $key => $value) {
						  			# code...
				  					echo "<option value='".$value['id']."'>".$value['nama']."</option>";
						  		}
							    
						  	echo "</select>
						  	</div>
						</div>
						
						<div class='form-group'>
					        <label for='inputIsi' class='control-label col-xs-2'> Isi Surat</label>
					        <div class='col-xs-10'>
					            <textarea class='form-control' name='inputIsi' id='inputIsi' rows='20'></textarea>
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
