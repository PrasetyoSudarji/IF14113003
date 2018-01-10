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
					                <th> Official </th>
					                <th> Jabatan </th>
					                <th> Detail Anggota </th>
					    		</tr>
					        </thead>
					        
					        <tbody>";
					        	$no = 1;
					        	foreach ($listAnggota as $key => $value) {
					        		# code...
					        		if(($value['kode_dojo'] == $_SESSION['kode_dojo'])){
					        			echo "<tr>";
					        			echo "<td> ".$no." </td>";
					        			echo "<td> ".$value['nama']."</td>";
					        			echo "<td> ".$value['tingkatan']." </td>";
					        			echo "<td> ".$value['atlit']." </td>";
					        			echo "<td> ".$value['juri']." </td>";
					        			if($value['level']==1){
					        				echo "<td> Anggota </td>";
					        			}else if ($value['level']==2){
					        				echo "<td> Pengurus </td>";
					        			}
					        			echo "<td> ".$value['jabatan']." </td>";
					        			if($_SESSION['jabatan']=='Admin' || $_SESSION['jabatan'] == 'Ketua'){
					        				echo "<td> <button class='button' onclick='viewUser(".$value['id'].");'> View </button> ";
					        				echo "<button class='button' onclick='editUserByAdmin(".$value['id'].");'> Edit </button> </td>";
					        			}else{
					        				echo "<td> <button class='button' onclick='viewUser(".$value['id'].");'> View </button> </td>";
					        			}
					        			
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