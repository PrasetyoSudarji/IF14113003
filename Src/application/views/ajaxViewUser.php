<?php
	foreach ($infoUser as $key => $value) {
		# code...
	
	echo "
	<form action='".base_url()."index.php/anggota'>
		<div class='col-xs-3'>
	        <b>Nama Anggota</b>
	    </div>
	    <div class='col-xs-9'>
	     : ".$value['nama']."
	    </div>

	    <div class='col-xs-12'><br></div>

	    <div class='col-xs-3'>
	        <b>Status Anggota</b>
	    </div>
	    <div class='col-xs-9'>
	     : ".$value['status']."
	    </div>

	    <div class='col-xs-12'><br></div>

	    <div class='col-xs-3'>
	        <b>Dojo </b>
	    </div>
	    <div class='col-xs-9'>
	     : ".$infoDojoName."
	    </div>

	    <div class='col-xs-12'><br></div>

	    <div class='col-xs-3'>
	        <b>Tinkatan Anggota</b>
	    </div>
	    <div class='col-xs-9'>
	     : ".$value['tingkatan']."
	    </div>

	    <div class='col-xs-12'><br></div>

	    <div class='col-xs-3'>
	        <b>Status Atlit Anggota</b>
	    </div>
	    <div class='col-xs-9'>
	     : ".$value['atlit']."
	    </div>

	    <div class='col-xs-12'><br></div>

	    <div class='col-xs-3'>
	        <b>Status Juri/Wasit Anggota</b>
	    </div>
	    <div class='col-xs-9'>
	     : ".$value['juri']."
	    </div>

	    <div class='col-xs-12'><br></div>

	    <div class='col-xs-3'>
	        <b>Jabatan Anggota</b>
	    </div>
	    <div class='col-xs-9'>
	     : ".$value['jabatan']."
	    </div>

	    <div class='col-xs-12'><br></div>

	    <div class='form-group'>
	        <div class='col-xs-offset-5 col-xs-7' >
	            <button type='submit' class='btn btn-primary' style='min-width: 20%;'> Kembali </button>
	        </div>
	    </div>
	</form>
	";
	}	
?>
