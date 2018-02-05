<?php

	echo "<div class='container'>
			<div class='container-content' style='min-height:50px;'>
				<div class='header-content'>
					<h4><b>
					REQUEST ATLIT
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
					                <th> Nama Dojo Asal </th>
					                <th> Action </th>
					    		</tr>
					        </thead>
					        
					        <tbody>";
					        	$no = 1;
					        	foreach ($listRequest as $key => $value) {
					        		# code...
					        		if($value['status_request'] == 'Menunggu Persetujuan' && $value['tipe_request'] == 'Atlit Nasional'){

					        			$infoUser = $this->Model->ambil('id',$value['id_anggota'],'tbl_user')->result_array();
					        			foreach ($infoUser as $key => $value2) {
					        				# code...
					        				echo "<tr>";
						        			echo "<td> ".$no." </td>";
						        			echo "<td> ".$value2['nama']."</td>";
						        			echo "<td> ".$value2['tingkatan']." </td>";
						        			if($value2['kode_dojo'] != null){

							        			$queryDojo = $this->Model->getDojo('kode_dojo',$value2['kode_dojo'])->result_array();
							        			foreach ($queryDojo as $key => $value3) {
							        				# code...
							        				echo "<td> ".$value3['nama_dojo']." </td>";
							        			}
							        		}else{
							        			echo "<td> - </td>";
							        		}
						        			echo "<td> <button class='button' onclick='acceptRequestAtlitNasional(".$value['kode_request'].");'> Terima </button> 
						        				<button class='button' onclick='declineRequestAtlitNasional(".$value['kode_request'].");'> Tolak </button>
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