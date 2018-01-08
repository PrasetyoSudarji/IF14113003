<?php

	echo "<div class='container'>
			<div class='container-content' style='min-height:50px;'>
				<div class='header-content'>
					<h4><b>
					REQUEST PERPINDAHAN
					</b></h4>
				</div>
			</div>

			<div class='container-content' style='min-height:450px;'>
				<div class='body-content'>
				<div id='placeholderPerpindahan'>
					<div class='table-responsive'>
						<table id='list' class='table table-hover table-bordered' cellspacing='0' width='100%'>
					        <thead>
					            <tr class='active'>
					                <th> No </th>
					                <th> Nama Anggota </th>
					                <th> Tingkatan </th>
									<th> Atlit </th>
					                <th> Wasit/Juri </th>
					                <th> Nama Dojo Asal </th>
					                <th> Action </th>
					    		</tr>
					        </thead>
					        
					        <tbody>";
					        	$no = 1;
					        	foreach ($listRequest as $key => $value) {
					        		# code...
					        		if(($value['kode_dojo_tujuan'] == $_SESSION['kode_dojo']) && $value['status_perpindahan'] == 'Menunggu Persetujuan'){

					        			$infoUser = $this->Model->ambil('id',$value['id_anggota'],'tbl_user')->result_array();
					        			foreach ($infoUser as $key => $value2) {
					        				# code...
					        				echo "<tr>";
						        			echo "<td> ".$no." </td>";
						        			echo "<td> ".$value2['nama']."</td>";
						        			echo "<td> ".$value2['tingkatan']." </td>";
						        			echo "<td> ".$value2['atlit']." </td>";
						        			echo "<td> ".$value2['juri']." </td>";
						        			$queryDojo = $this->Model->getDojo('kode_dojo',$value2['kode_dojo'])->result_array();
						        			foreach ($queryDojo as $key => $value3) {
						        				# code...
						        				echo "<td> ".$value3['nama_dojo']." </td>";
						        			}
						        			echo "<td> <button class='button' onclick='acceptRequest(".$value['kode_perpindahan'].");'> Terima </button> 
						        				<button class='button' onclick='declineRequest(".$value['kode_perpindahan'].");'> Tolak </button>
						        				</td>";
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