<?php

	echo "<div class='container'>
			<div class='container-content' style='min-height:50px;'>
				<div class='header-content'>
					<h4><b>
					TAMBAH DOJO
					</b></h4>
				</div>
			</div>

			<div class='container-content' style='min-height:450px;'>
				<div class='body-content'>
					<form class='form-horizontal' method='POST' action='".base_url()."index.php/dojo/prosesTambah'>
						<div class='form-group'>
					        <label for='inputNama' class='control-label col-xs-2'> Nama Dojo</label>
					        <div class='col-xs-10'>
					            <input type='text' class='form-control' name='inputNama' id='inputNama'>
					        </div>
					    </div>
					    
					    <div class='form-group'>
					        <div class='col-xs-offset-5 col-xs-7' >
					            <button type='submit' class='btn btn-primary' style='min-width: 20%;'> Input </button>
					        </div>
					    </div>
					</form>

				</div>
			</div>
		</div>
	";
?>
