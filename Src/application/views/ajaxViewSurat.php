<?php
	foreach ($infoSuratEdaran as $key => $value) {
		# code...
	
	echo "
	<form action='".base_url()."index.php/suratEdaran'>
		<div class='col-xs-3'>
	        <b>Judul Surat/Edaran</b>
	    </div>
	    <div class='col-xs-9'>
	     : ".$value['judul_surat_edaran']."
	    </div>

	    <div class='col-xs-12'><br></div>

	    <div class='col-xs-3'>
	        <b>Perihal Surat/Edaran</b>
	    </div>
	    <div class='col-xs-9'>
	     : ".$value['perihal']."
	    </div>

	    <div class='col-xs-12'><br></div>

	    <div class='col-xs-3'>
	        <b>Pengirim </b>
	    </div>
	    <div class='col-xs-9'>
	     : ".$infoNamePengirim."
	    </div>

	    <div class='col-xs-12'><br></div>

	    <div class='col-xs-3'>
	        <b>Isi Surat/Edaran</b>
	    </div>
	    <div class='col-xs-9'>
	     : ".$value['isi_surat_edaran']."
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
