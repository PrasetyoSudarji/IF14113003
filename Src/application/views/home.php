<?php
if(!$this->session->has_userdata('login')){
	echo "
	<div style='min-height: 500px;border: 2px solid #0f0f0f; border-radius: 5px; margin : 5px; padding : 5px; position : relative'>
		<div style='margin: 0;position: absolute;top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);'>
			<h1><b> WELCOME </b></h1>
		</div>
	</div>";
}else{
	if($_SESSION['status']=='non-active'){
		echo "<div class='container'>
				<div class='container-content' style='min-height:100px;'>
					<div class='header-content'>
						<h4><b>
						HOME
						</b></h4>
					</div>
				</div>

				<div class='container-content' style='min-height:250px;'>
					<div class='body-content'>";

						foreach ($infoUser as $key => $value) {
							# code...
							if($value['tingkatan'] == null || $value['tempat_lahir'] == NULL|| $value['tanggal_lahir'] == NULL|| $value['telepon'] == NULL|| $value['email'] == NULL|| $value['alamat'] == NULL|| $value['foto']== NULL){
								echo "<p align='center'>
									<b style='color:red;'>Please complete your <em>profile</em> first !!</b><br>
									<b style='color:red;'>Tingkatan, tempat lahir, tanggal lahir, telepon, e-mail, alamat dan foto tidak boleh kosong</b>
								</p>";
							}else if($value['jabatan'] == NULL){
								$validator = true;
								foreach ($listRequest as $key => $value) {
									# code...
									if($value['id_anggota'] == $_SESSION['login'] && $value['status_request'] == 'Menunggu Persetujuan'){
										$validator = false;
									}else{
										$validator = true;
									}
								}

								if($validator == false){
									echo "<p align='center'>
										<b style='color:red;'>Request is already on progress !!</b>
									</p>";
								}else{
									echo "<p align='center'>
										<b style='color:red;'>Please select your dojo first !!</b>
									</p>

									<br><br>
									<form class='form-horizontal' method='POST' action='".base_url()."index.php/anggota/prosesRequest'>
										<div class='form-group'>
										  	<label for='inputDojo' class='control-label col-xs-2'> Dojo </label>
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
									        <div class='col-xs-offset-5 col-xs-7' >
									            <button type='submit' class='btn btn-primary' style='min-width: 20%;'> Input </button>
									        </div>
									    </div>
									</form>";
								}
							}
						}
						echo "				
					</div>
				</div>

				<div class='container-content' style='min-height:50px;'>
					<h3 style='text-align:center;'> Welcome to Website Karate Indonesia </h3><hr>
				</div>
			</div>
		";
	}else{
		echo "<div class='container'>
				<div class='container-content' style='min-height:100px;'>
					<div class='header-content'>
						<h3>
						<b> Total Anggota : ";
						$counterAnggota = 0;
						foreach ($listAnggota as $key => $value) {
							# code...
							if($value['jabatan'] != 'Admin' && $value['status'] == 'aktif'){
								$counterAnggota ++;
							}
						}
						echo $counterAnggota;
						if($_SESSION['jabatan'] != 'Admin Kabupaten' || $_SESSION['jabatan'] != 'Admin Provinsi' || $_SESSION['jabatan'] != 'Admin Nasional'){
							echo " </br>
							Saldo Dojo : ";
							echo 'Rp. ' . number_format( $saldoDojo, 0 , '' , '.' ) . ',-';
						}
						echo "</b>
						</h3>
					</div>
				</div>

				<div class='container-content' style='min-height:250px;'>
					<div class='body-content'>
						<p>
							Lorem ipsum dolor sit amet, adversarium concludaturque pro eu. Est ut error tollit. Ex sit possim meliore erroribus, duis argumentum inciderint mea ut. Usu ex vero etiam impetus, ius an agam veniam tantas, nisl legere ex eos.
						</p>
						<p>
						Congue nonumy id eam, vel an virtute feugiat. At illud homero suscipiantur ius, ex natum virtute his. Probatus accusamus duo at, iriure albucius vix te. Hinc perfecto assentior no eum, cu sea erroribus voluptatibus. Sit inermis vituperatoribus et, nemore singulis dissentiet et eos, qui id rebum gubergren liberavisse. Homero delenit pericula ea sea.
						</p>
						<p>
						Ea vis liber solet electram, omnium detraxit legendos nam ad, lorem praesent dignissim eu mea. Eum mundi fastidii laboramus ei, ne ullum tritani usu. Ei mea sale prodesset persequeris, idque sonet tibique an vix, sit ad mutat alterum dolorem. Populo delenit utroque vim ut.
						</p>
					</div>
				</div>

				<div class='container-content' style='min-height:200px;'>
					<h3 style='text-align:center;'> Pengurus </h3><hr>
				";
					foreach ($listAnggota as $key => $value) {
						# code...
						if($value['jabatan'] != 'Anggota'){
							echo "
							<div class='footer-content'>
								".$value['jabatan']." : ".$value['nama']."
							</div>
						";	
						}
					}

				echo "</div>
			</div>
		";
	}
	
}
	
?>