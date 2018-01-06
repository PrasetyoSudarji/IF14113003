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
					        		$query = $this->Model->getDojo('kode_dojo',$value['kode_dojo'])->result_array();
					        		foreach ($query as $key => $value2) {
					        			# code...
					        			if($value2['kode_kabupaten_kota'] == $_SESSION['kode_kabupaten_kota']){
					        				echo "<tr>";
						        			echo "<td> ".$no." </td>";
						        			echo "<td> ".$value['nama']."</td>";
						        			echo "<td> ".$value['atlit']." </td>";
						        			echo "<td> ".$value['juri']." </td>";
						        			echo "<td> ".$value['jabatan']." </td>";
						        			echo "<td> <button class='button' onclick='updateUser(".$value['id'].");'> Update </button> </td>";
						        			echo "</tr>";
						        			$no++;
					        			}
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