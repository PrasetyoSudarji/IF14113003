<?php
	foreach ($infoUser as $key => $value) {
		# code...
	}
	echo "<form class='form-horizontal' method='POST' action='".base_url()."index.php/anggota/update'>
       	<input type='hidden' readonly class='form-control' name='inputId' id='inputId' value='".$value['id']."'>
		<div class='form-group'>
	        <label for='inputNama' class='control-label col-xs-2'> Nama Anggota</label>
	        <div class='col-xs-10'>
	            <input type='text' readonly class='form-control' name='inputNama' id='inputNama' value='".$value['nama']."'>
	        </div>
	    </div>
	    
		<div class='form-group'>
		  	<label for='inputJuri' class='control-label col-xs-2'> Wasit/Juri </label>
		  	<div class='col-xs-10'>
		  	<select class='form-control' id='inputJuri' name='inputJuri'>";
			    $totalJuri = count($listJuri);
		  		for($i = 0;$i<$totalJuri;$i++) {
		  			# code...
  					echo "<option value='".$listJuri[$i]."'>".$listJuri[$i]."</option>";
		  		}
		  	echo "</select>
		  	</div>
		</div>

		<div class='form-group'>
		  	<label for='inputAtlit' class='control-label col-xs-2'> Atlit </label>
		  	<div class='col-xs-10'>
		  	<select class='form-control' id='inputAtlit' name='inputAtlit'>";
			    $totalAtlit = count($listAtlit);
		  		for($i = 0;$i<$totalAtlit;$i++) {
		  			# code...
  					echo "<option value='".$listAtlit[$i]."'>".$listAtlit[$i]."</option>";
		  		}
		  	echo "</select>
		  	</div>
		</div>
	    
	    <div class='form-group'>
	        <div class='col-xs-offset-5 col-xs-7' >
	            <button type='submit' class='btn btn-primary' style='min-width: 20%;'> Update </button>
	        </div>
	    </div>
	</form>
	";
?>
