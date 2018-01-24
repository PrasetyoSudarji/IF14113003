<?php

	echo "<div class='container'>
			<div class='container-content' style='min-height:50px;'>
				<div class='header-content'>
					<h4><b>
					PROVINSI
					</b></h4>
				</div>
			</div>

			<div class='container-content' style='min-height:450px;'>
				<div class='body-content'>
				<div id='placeholderProvinsi'>
					<div class='table-responsive'>
						<table id='list' class='table table-hover table-bordered' cellspacing='0' width='100%'>
					        <thead>
					            <tr class='active'>
					                <th> No </th>
					                <th> Nama Provinsi </th>
					                <th> Action </th>
					    		</tr>
					        </thead>
					        
					        <tbody>";
					        	$no = 1;
					        	foreach ($listProvinsi as $key => $value) {
					        		# code...
					        		echo "<tr>";
					        		echo "<td>".$no."</td>";
					        		echo "<td>".$value['nama_provinsi']."</td>";
					        		echo "<td><button class='button' onclick='editProvinsi(".$value['kode_provinsi'].");'> Edit </button> </td>";
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