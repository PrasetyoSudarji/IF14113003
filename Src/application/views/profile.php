<?php

	echo "<div class='container'>
			<div class='container-content' style='min-height:50px;'>
				<div class='header-content'>
					<h4><b>
					PROFILE
					</b></h4>
				</div>
			</div>

			<div class='container-content' style='min-height:450px;'>
				<div class='body-content'>
					<form class='form-horizontal' method='POST' action='".base_url()."index.php/profile/edit'>";
						foreach ($infoUser as $key => $user) {
							# code...
						}
						$namaDojo = null;
						$infoDojo = $this->Model->getDojo('kode_dojo',$user['kode_dojo'])->result_array();
						foreach ($infoDojo as $key => $dojo) {
							# code...
							$namaDojo = $dojo['nama_dojo'];
						}

						echo "
						<div class='form-group'>
					        <label for='inputFoto' class='control-label col-xs-2'> Foto </label>
					        <div class='col-xs-10'>
					        	<img src='".base_url()."assets/upload/".$user['foto']."' alt='Profile pic' height='200' width='200'>
					        	<hr>
					        	<button type='button' name='inputFoto' id='inputFoto' class='btn btn-primary' style='min-width: 20%;' data-toggle='modal' data-target='#change-foto-modal'> Change </button>
					        </div>
					    </div>

						<div class='form-group'>
					        <label for='inputNama' class='control-label col-xs-2'> Nama </label>
					        <div class='col-xs-10'>
					            <input type='text' class='form-control' name='inputNama' id='inputNama' value='".$user['nama']."'>
					        </div>
					    </div>

					    <div class='form-group'>
					        <label for='inputDojo' class='control-label col-xs-2'> Dojo </label>
					        <div class='col-xs-10'>
					            <input type='text' class='form-control' name='inputDojo' id='inputDojo' value='".$namaDojo."' readonly>
					        </div>
					    </div>

					    <div class='form-group'>
					        <label for='inputJabatan' class='control-label col-xs-2'> Jabatan </label>
					        <div class='col-xs-10'>
					            <input type='text' class='form-control' name='inputJabatan' id='inputJabatan' value='".$user['jabatan']."' readonly>
					        </div>
					    </div>

					    <div class='form-group'>
						  	<label for='inputTingkatan' class='control-label col-xs-2'> Tingkatan </label>
						  	<div class='col-xs-10'>
						  	<select class='form-control' id='inputTingkatan' name='inputTingkatan'>";
						  		$totalTingkatan = count($listTingkatan);
						  		for($i = 0;$i<$totalTingkatan;$i++) {
						  			# code...
						  			if($user['tingkatan']==$listTingkatan[$i]){
						  				echo "<option value='".$listTingkatan[$i]."' selected>".$listTingkatan[$i]."</option>";	
						  			}else{
						  				echo "<option value='".$listTingkatan[$i]."'>".$listTingkatan[$i]."</option>";
						  			}
						  		}
							    
						  	echo "</select>
						  	</div>
						</div>

						<div class='form-group'>
					        <label for='inputTempatLahir' class='control-label col-xs-2'> Tempat Lahir </label>
					        <div class='col-xs-10'>
					            <input type='text' class='form-control' name='inputTempatLahir' id='inputTempatLahir' value='".$user['tempat_lahir']."'>
					        </div>
					    </div>

					    <div class='form-group'>
					        <label for='inputTanggalLahir' class='control-label col-xs-2'> Tanggal Lahir </label>
					        <div class='col-xs-10'>
					            <input type='date' class='form-control' name='inputTanggalLahir' id='inputTanggalLahir' value='".$user['tanggal_lahir']."'>
					        </div>
					    </div>

					    <div class='form-group'>
					        <label for='inputTelepon' class='control-label col-xs-2'> Telepon </label>
					        <div class='col-xs-10'>
					            <input type='text' class='form-control' name='inputTelepon' id='inputTelepon' value='".$user['telepon']."'>
					        </div>
					    </div>

					    <div class='form-group'>
					        <label for='inputEmail' class='control-label col-xs-2'> E-mail </label>
					        <div class='col-xs-10'>
					            <input type='text' class='form-control' name='inputEmail' id='inputEmail' value='".$user['email']."'>
					        </div>
					    </div>

					    <div class='form-group'>
					        <label for='inputAlamat' class='control-label col-xs-2'> Alamat </label>
					        <div class='col-xs-10'>
					            <textarea type='text' class='form-control' name='inputAlamat' id='inputAlamat' rows='5'>".$user['alamat']."</textarea>
					        </div>
					    </div>

					    <div class='form-group'>
					        <label for='inputTahunMasuk' class='control-label col-xs-2'> Tahun Masuk </label>
					        <div class='col-xs-10'>
					            <input type='text' class='form-control' name='inputTahunMasuk' id='inputTahunMasuk' value='".$user['tahun_masuk']."'>
					        </div>
					    </div>

					    <div class='form-group'>
					        <label for='inputDojoPertama' class='control-label col-xs-2'> Dojo Pertama </label>
					        <div class='col-xs-10'>
					            <input type='text' class='form-control' name='inputDojoPertama' id='inputDojoPertama' value='".$user['dojo_pertama']."'>
					        </div>
					    </div>

					    <div class='form-group'>
					        <label for='inputKota' class='control-label col-xs-2'> Kota Dojo Pertama </label>
					        <div class='col-xs-10'>
					            <input type='text' class='form-control' name='inputKota' id='inputKota' value='".$user['kota']."'>
					        </div>
					    </div>

					    <div class='form-group'>
					        <label for='inputNamaPelatih' class='control-label col-xs-2'> Nama Pelatih Dojo Pertama </label>
					        <div class='col-xs-10'>
					            <input type='text' class='form-control' name='inputNamaPelatih' id='inputNamaPelatih' value='".$user['nama_pelatih']."'>
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
<div class="modal fade" id="change-foto-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="loginmodal-container">
      <h1>Choose your foto </h1><br>
      <form class="form" action="<?=base_url()?>index.php/profile/changeFoto" method="post" enctype="multipart/form-data" autocomplete="off">
      	<div class='form-group'>
	        <label>Select your foto </label>
	        <div class='col-xs-10'>
	            <input type="file" class='form-control' name="inputFoto" accept=".gif, .jpg, .png" required />
	        </div>
	    </div>
	    <hr>
        <input type="submit" name="login" class="login loginmodal-submit" value="OK">
      </form>
    </div>
  </div>
</div>