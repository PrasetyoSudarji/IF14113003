<?php

	echo "<div class='container'>
			<div class='container-content' style='min-height:50px;'>
				<div class='header-content'>
					<h4><b>
					IURAN
					</b></h4>
				</div>
			</div>

			<div class='container-content' style='min-height:450px;'>
				<div class='body-content'>
					<div class='table-responsive'>
						<table id='list' class='table table-hover table-bordered' cellspacing='0' width='100%'>
					        <thead>
					            <tr class='active'>
					                <th> No </th>
					                <th> Nama </th>
					                <th> Jan </th>
									<th> Feb </th>
					                <th> Mar </th>
					                <th> Apr </th>
					                <th> May </th>
					                <th> Jun </th>
					                <th> Jul </th>
					                <th> Aug </th>
					                <th> Sep </th>
					                <th> Oct </th>
					                <th> Nov </th>
					                <th> Dec </th>
					                <th> Status </th>
					    		</tr>
					        </thead>
					        <tfoot>
					            <tr>
					                <th> No </th>
					                <th> Nama </th>
					                <th> Jan </th>
									<th> Feb </th>
					                <th> Mar </th>
					                <th> Apr </th>
					                <th> May </th>
					                <th> Jun </th>
					                <th> Jul </th>
					                <th> Aug </th>
					                <th> Sep </th>
					                <th> Oct </th>
					                <th> Nov </th>
					                <th> Dec </th>
					                <th> Status </th>
					    		</tr>
					        </tfoot>
					        <tbody>";
					        $no = 1;
					        foreach ($listAnggota as $key => $value) {
					        	# code...
					        	if($value['kode_dojo'] == $_SESSION['kode_dojo']){
					        		echo "<tr>";
						        	echo "<td>".$no."</td>";
						        	echo "<td>".$value['nama']."</td>";
						        	$status = true;
						        	$arrayName = array('January' => 0,
											        	'February' => 0,
											        	'March' => 0,
											        	'April' => 0,
											        	'May' => 0,
											        	'June' => 0,
											        	'July' => 0,
											        	'August' => 0,
											        	'September' => 0,
											        	'October' => 0,
											        	'November' => 0,
											        	'December' => 0,
											        	 );
					        		foreach ($listIuran as $key => $value2) {
						        		# code...
						        		$month = date("F",strtotime($value2['waktu_iuran']));
						        		if($value['id'] == $value2['id_anggota']){
						        			$arrayName[$month] += $value2['besaran_iuran'];
					        			}
					        		}
						        	$status = true;
						        	if($arrayName['January']==0 && date('n')<=1){
						        		$status = false;
						        	}else if($arrayName['February']==0 && date('n')<=2){
						        		$status = false;
						        	}else if($arrayName['March']==0 && date('n')<=3){
						        		$status = false;
						        	}else if($arrayName['April']==0 && date('n')<=4){
						        		$status = false;
						        	}else if($arrayName['May']==0 && date('n')<=5){
						        		$status = false;
						        	}else if($arrayName['June']==0 && date('n')<=6){
						        		$status = false;
						        	}else if($arrayName['July']==0 && date('n')<=7){
						        		$status = false;
						        	}else if($arrayName['August']==0 && date('n')<=8){
						        		$status = false;
						        	}else if($arrayName['September']==0 && date('n')<=9){
						        		$status = false;
						        	}else if($arrayName['October']==0 && date('n')<=10){
						        		$status = false;
						        	}else if($arrayName['November']==0 && date('n')<=11){
						        		$status = false;
						        	}else if($arrayName['December']==0 && date('n')<=12){
						        		$status = false;
						        	}
						        	echo '<td>Rp. ' . number_format( $arrayName['January'], 0 , '' , '.' ) . '</td>';
						        	echo '<td>Rp. ' . number_format( $arrayName['February'], 0 , '' , '.' ) . '</td>';
						        	echo '<td>Rp. ' . number_format( $arrayName['March'], 0 , '' , '.' ) . '</td>';
						        	echo '<td>Rp. ' . number_format( $arrayName['April'], 0 , '' , '.' ) . '</td>';
						        	echo '<td>Rp. ' . number_format( $arrayName['May'], 0 , '' , '.' ) . '</td>';
						        	echo '<td>Rp. ' . number_format( $arrayName['June'], 0 , '' , '.' ) . '</td>';
						        	echo '<td>Rp. ' . number_format( $arrayName['July'], 0 , '' , '.' ) . '</td>';
						        	echo '<td>Rp. ' . number_format( $arrayName['August'], 0 , '' , '.' ) . '</td>';
						        	echo '<td>Rp. ' . number_format( $arrayName['September'], 0 , '' , '.' ) . '</td>';
						        	echo '<td>Rp. ' . number_format( $arrayName['October'], 0 , '' , '.' ) . '</td>';
						        	echo '<td>Rp. ' . number_format( $arrayName['November'], 0 , '' , '.' ) . '</td>';
						        	echo '<td>Rp. ' . number_format( $arrayName['December'], 0 , '' , '.' ) . '</td>';

						        	if($status){
						        		echo "<td> Ok </td>";	
						        	}else{
						        		echo "<td> Alert </td>";	
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
	";
?>