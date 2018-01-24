<?php

	echo "<div class='container'>
			<div class='container-content' style='min-height:50px;'>
				<div class='header-content'>
					<h4><b>
					KABUPATEN
					</b></h4>
				</div>
			</div>

			<div class='container-content' style='min-height:450px;'>
				<div class='body-content'>
				<div id='placeholderKabupaten'>
					<div class='table-responsive'>
						<table id='list' class='table table-hover table-bordered' cellspacing='0' width='100%'>
					        <thead>
					            <tr class='active'>
					                <th> No </th>
					                <th> Nama Kabupaten </th>
					                <th> Nama Provinsi </th>
					                <th> Action </th>
					    		</tr>
					        </thead>
					        
					        <tbody>";
					        	$no = 1;
					        	foreach ($listKabupaten as $key => $value) {
					        		# code...
					        		echo "<tr>";
					        		echo "<td>".$no."</td>";
					        		echo "<td>".$value['nama_kabupaten_kota']."</td>";

					        		$infoProvinsi = $this->Model->ambil('kode_provinsi',$value['kode_provinsi'],'tbl_provinsi')->result_array();
					        		foreach ($infoProvinsi as $key => $value2) {
					        			# code...
					        			echo "<td>".$value2['nama_provinsi']."</td>";
					        		}

					        		echo "<td><button class='button' onclick='editKabupaten(".$value['kode_kabupaten_kota'].");'> Edit </button> </td>";
					        		
					        		echo "</tr>";
					        		$no++;
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