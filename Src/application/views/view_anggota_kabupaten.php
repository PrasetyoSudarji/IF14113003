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
					        	$queryDojo = null;
					        	foreach ($listAnggota as $key => $value) {
					        		# code...
					        		$kodeKabupatenKota = null;
					        		if($value['kode_dojo'] != null){
					        			$queryDojo = $this->Model->getDojo('kode_dojo',$value['kode_dojo'])->result_array();
					        			foreach ($queryDojo as $key => $value2) {
					        				# code...
					        				$kodeKabupatenKota = $value2['kode_kabupaten_kota'];
					        			}
					        		}
					        		
				        			if(($kodeKabupatenKota == $_SESSION['kode_kabupaten_kota'] || $value['status'] == 'non-active') && $value['jabatan'] != 'Admin Kabupaten'){
				        				echo "<tr>";
					        			echo "<td> ".$no." </td>";
					        			echo "<td> ".$value['nama']."</td>";
					        			echo "<td> ".$value['atlit']." </td>";
					        			echo "<td> ".$value['juri']." </td>";
					        			echo "<td> ".$value['jabatan']." </td>";
					        			echo "<td> 
					        			<button class='button' onclick='viewUser(".$value['id'].");'> View </button> 
					        			<button class='button' onclick='updateUserByKabKot(".$value['id'].");'> Update </button> 
					        			<button class='button' onclick='promoteUserByKabKot(".$value['id'].");'> Promote </button> </td>";
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