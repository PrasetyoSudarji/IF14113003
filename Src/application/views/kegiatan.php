<?php

	echo "<div class='container'>
			<div class='container-content' style='min-height:50px;'>
				<div class='header-content'>
					<h4><b>
					KEGIATAN & KEJUARAAN
					</b></h4>
				</div>
			</div>

			<div class='container-content' style='min-height:450px;'>
				<div class='body-content'>
				<h4 style='text-align:center;'>
					SEMUA KEGIATAN
				</h4><hr>
					<div class='table-responsive'>
						<table id='list' class='table table-hover table-bordered' cellspacing='0' width='100%'>
					        <thead>
					            <tr class='active'>
					                <th> No </th>
					                <th> Waktu Kegiatan </th>
					                <th> Nama Kegiatan </th>
									<th> Level Kegiatan </th>
					                <th> Biaya </th>
					                <th> Detail Kegiatan </th>
					    		</tr>
					        </thead>
					        <tfoot>
					            <tr>
					                <th> No </th>
					                <th> Waktu Kegiatan </th>
					                <th> Nama Kegiatan </th>
									<th> Level Kegiatan </th>
					                <th> Biaya </th>
					                <th> </th>
					    		</tr>
					        </tfoot>
					        <tbody>";
					        	$no = 1;
					        	foreach ($listKegiatan as $key => $value) {
					        		# code...
					        		if(($value['kode_dojo'] == $_SESSION['kode_dojo']) || ($value['level_kegiatan']!="dojo")){
					        			echo "<tr>";
					        			echo "<td> ".$no." </td>";
					        			echo "<td> ".$value['waktu_mulai_kegiatan']." sampai ".$value['waktu_selesai_kegiatan']."</td>";
					        			echo "<td> ".$value['nama_kegiatan']." </td>";
					        			echo "<td> ".$value['level_kegiatan']." </td>";
					        			echo "<td>Rp. " . number_format( $value['biaya_kegiatan'], 0 , "" , "." ) . ",-</td>";
					        			echo "<td> <button class='button'> View </button> </td>";
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
	";
?>