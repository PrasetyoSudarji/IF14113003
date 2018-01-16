<?php

	echo "<div class='container'>
			<div class='container-content' style='min-height:50px;'>
				<div class='header-content'>
					<h4><b>
					ANGGOTA
					</b></h4>
				</div>
			</div>

			<div class='container-content' style='min-height:450px;'>
				<div class='body-content'>
				<div id='placeholderUser'>
					<div class='table-responsive'>
						<table id='list' class='table table-hover table-bordered' cellspacing='0' width='100%'>
					        <thead>
					            <tr class='active'>
					                <th> No </th>
					                <th> Nama </th>
					                <th> Tingkatan </th>
									<th> Atlit </th>
					                <th> Wasit/Juri </th>
					                <th> Jabatan </th>
					                <th> Detail Anggota </th>
					    		</tr>
					        </thead>
					        
					        <tbody>";
					        	$no = 1;
					        	foreach ($listAnggota as $key => $value) {
					        		# code...
					        		$queryDojo = null;
					        		$queryKabupatenKota = null;
					        		$queryProvinsi = null;
					        		$kodeProvinsi = null;

					        		if($value['kode_dojo'] != null){
					        			$queryDojo = $this->Model->getDojo('kode_dojo',$value['kode_dojo'])->result_array();
					        			foreach ($queryDojo as $key => $value2) {
					        				# code...
						        			$queryKabupatenKota = $this->Model->getKabupatenKota('kode_kabupaten_kota',$value2['kode_kabupaten_kota'])->result_array();
						        			foreach ($queryKabupatenKota as $key => $value3) {
						        				# code...
						        				$queryProvinsi = $this->Model->getProvinsi('kode_provinsi',$value3['kode_provinsi'])->result_array();
						        				foreach ($queryProvinsi as $key => $value4) {
						        					# code...
						        					$kodeProvinsi = $value4['kode_provinsi'];
						        					
						        				}
						        			}
						        		}
					        		}else if($value['kode_kabupaten_kota'] != null){
					        			$queryKabupatenKota = $this->Model->getKabupatenKota('kode_kabupaten_kota',$value['kode_kabupaten_kota'])->result_array();
					        			foreach ($queryKabupatenKota as $key => $value2) {
					        				# code...
					        				$queryProvinsi = $this->Model->getProvinsi('kode_provinsi',$value2['kode_provinsi'])->result_array();
					        				foreach ($queryProvinsi as $key => $value3) {
					        					# code...
					        					$kodeProvinsi = $value3['kode_provinsi'];
					        					
					        				}
					        			}
					        		}else if($value['kode_provinsi'] != null){
					        			$queryProvinsi = $this->Model->getProvinsi('kode_provinsi',$value['kode_provinsi'])->result_array();
				        				foreach ($queryProvinsi as $key => $value2) {
				        					# code...
				        					$kodeProvinsi = $value2['kode_provinsi'];
				        					
				        				}
					        		}

					        		if((($kodeProvinsi == $_SESSION['kode_provinsi']) || $value['status']=='non-active') && $value['jabatan'] != 'Admin Provinsi') {
					        			echo "<tr>";
					        			echo "<td> ".$no." </td>";
					        			echo "<td> ".$value['nama']."</td>";
					        			echo "<td> ".$value['tingkatan']." </td>";
					        			echo "<td> ".$value['atlit']." </td>";
					        			echo "<td> ".$value['juri']." </td>";
					        			echo "<td> ".$value['jabatan']." </td>";
					        			echo "<td> 
					        				<button class='button' onclick='viewUser(".$value['id'].");'> View </button> 
					        				<button class='button' onclick='promoteUserByProvinsi(".$value['id'].");'> Promote </button></td>";
					        			echo "</tr>";
					        			$no++;
					        		}
					        	}

					        echo "</tbody>
				        </table>
			        </div>
				</div>
				</div>
			</div>
		</div>
	";
?>