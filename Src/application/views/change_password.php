<?php

	echo "<div class='container'>
			<div class='container-content' style='min-height:50px;'>
				<div class='header-content'>
					<h4><b>
					CHANGE PASSWORD
					</b></h4>
				</div>
			</div>

			<div class='container-content' style='min-height:450px;'>
				<div class='body-content'>
					<form class='form-horizontal' method='POST' action='".base_url()."index.php/password/prosesChange'>
					    <div class='form-group'>
					        <label for='inputOldPassword' class='control-label col-xs-2'> Old Password </label>
					        <div class='col-xs-10'>
					            <input type='password' class='form-control' name='inputOldPassword' id='inputOldPassword' >
					        </div>
					    </div>

					    <div class='form-group'>
					        <label for='inputNewPassword' class='control-label col-xs-2'> New Password </label>
					        <div class='col-xs-10'>
					            <input type='password' class='form-control' name='inputNewPassword' id='inputNewPassword' >
					        </div>
					    </div>

					    <div class='form-group'>
					        <label for='inputConfirmNewPassword' class='control-label col-xs-2'> Confirm New Password </label>
					        <div class='col-xs-10'>
					            <input type='password' class='form-control' name='inputConfirmNewPassword' id='inputConfirmNewPassword'>
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