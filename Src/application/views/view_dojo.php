<?php

	echo "<div class='container'>
			<div class='container-content' style='min-height:50px;'>
				<div class='header-content'>
					<h4><b>
					DOJO
					</b></h4>
				</div>
			</div>

			<div class='container-content' style='min-height:450px;'>
				<div class='body-content'>
				<div id='placeholderDojo'>
					<div class='table-responsive'>
						<table id='list' class='table table-hover table-bordered' cellspacing='0' width='100%'>
					        <thead>
					            <tr class='active'>
					                <th> No </th>
					                <th> Nama Dojo </th>
					                <th> Ketua Dojo </th>
					    		</tr>
					        </thead>
					        
					        <tbody>";
					        	$no = 1;
					        	foreach ($listDojo as $key => $value) {
					        		# code...
				        			echo "<tr>";
				        			echo "<td> ".$no." </td>";
				        			echo "<td> ".$value['nama_dojo']."</td>";
				        			$namaKetua = null;
				        			foreach ($listUser as $key => $value2) {
				        				# code...
				        				if($value['kode_dojo']==$value2['kode_dojo'] && $value2['jabatan'] == 'Ketua'){
				        					$namaKetua = $value2['nama'];
				        				}
				        				
				        			}
				        			if($namaKetua!=null){
				        				echo "<td> ".$namaKetua." </td>";	
				        			}else{
				        				echo "<td> <b style='color:red;'> BELUM ADA KETUA </b></td>";
				        			}
				        			
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