<?php

	echo "<div class='container'>
			<div class='container-content' style='min-height:50px;'>
				<div class='header-content'>
					<h4><b>
					EDARAN
					</b></h4>
				</div>
			</div>

			<div class='container-content' style='min-height:450px;'>
				<div class='body-content'>
				<div id='placeholderSuratEdaran'>
					<div class='table-responsive'>
						<table id='list' class='table table-hover table-bordered' cellspacing='0' width='100%'>
					        <thead>
					            <tr class='active'>
					                <th> No </th>
					                <th> Judul Surat/Edaran </th>
					                <th> Jenis Surat/Edaran </th>
					                <th> Status Surat/Edaran </th>
					                <th> Perihal Surat/Edaran </th>
					                <th> Pengirim Surat/Edaran </th>
					                <th> Tanggal Surat/Edaran </th>
					                <th> Detail Surat/Edaran </th>
					    		</tr>
					        </thead>
					        
					        <tbody>";
					        	$no = 1;
					        	foreach ($listSuratEdaran as $key => $value) {
					        		# code...
					        		if($value['jenis_surat_edaran']=='Surat' && $value['id_penerima'] == $_SESSION['login']){
					        			echo "<tr>";
					        			echo "<td> ".$no." </td>";
					        			echo "<td> ".$value['judul_surat_edaran']." </td>";
					        			echo "<td> ".$value['jenis_surat_edaran']." </td>";
					        			echo "<td> ".$value['status_surat_edaran']." </td>";
					        			echo "<td> ".$value['perihal']." </td>";
					        			echo "<td> ".$infoNameUser." </td>";
					        			echo "<td> ".$value['tanggal_surat_edaran']." </td>";
					        			echo "<td> <button class='button' onclick='viewSurat(".$value['kode_surat_edaran'].");'> View </button> </td>";
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