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
					    ";
					    if($_SESSION['level']<3){
    						echo "<h3>
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
    						</h3>";
					    }else{
					        echo "<h3><b> HOME </b></h3>";
					    }
					echo "</div>
				</div>

				<div class='container-content' style='min-height:250px;'>
					<div class='body-content'>
						<h3 style='text-align:center;'> Welcome to Website Karate Indonesia </h3><hr>
					</div>
				</div>

				<div class='container-content' style='min-height:200px;'>
					<h3 style='text-align:center;'> Pengurus </h3><hr>
				";
					foreach ($listAnggota as $key => $value) {
						# code...
						if($_SESSION['level'] < 3){
    						if($value['jabatan'] != 'Anggota' && $value['level'] < 3){
					           	echo "
        							<div class='footer-content'>
        								".$value['jabatan']." : ".$value['nama']."
        							</div>
        						";
						    }
						}else if($_SESSION['level'] == 3){
    						if($value['jabatan'] != 'Anggota' && $value['level'] == 3){
					           	echo "
        							<div class='footer-content'>
        								".$value['jabatan']." : ".$value['nama']."
        							</div>
        						";
						    }
						}else if($_SESSION['level'] == 4){
    						if($value['jabatan'] != 'Anggota' && $value['level'] == 4){
					           	echo "
        							<div class='footer-content'>
        								".$value['jabatan']." : ".$value['nama']."
        							</div>
        						";
						    }
						}else if($_SESSION['level'] == 5){
    						if($value['jabatan'] != 'Anggota' && $value['level'] == 5){
					           	echo "
        							<div class='footer-content'>
        								".$value['jabatan']." : ".$value['nama']."
        							</div>
        						";
						    }
						}else if($_SESSION['level'] == 6){
    						if($value['jabatan'] != 'Anggota' && $value['level'] == 6){
					           	echo "
        							<div class='footer-content'>
        								".$value['jabatan']." : ".$value['nama']."
        							</div>
        						";
						    }
						}
					}

				echo "</div>
			</div>
		";
	}
	
}
	
?>