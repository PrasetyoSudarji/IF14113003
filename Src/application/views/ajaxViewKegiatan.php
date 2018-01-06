<?php
	foreach ($infoKegiatan as $key => $value) {
		# code...
	
	echo "
	<form action='".base_url()."index.php/kegiatan'>
		<div class='col-xs-3'>
	        <b>Nama Kegiatan</b>
	    </div>
	    <div class='col-xs-9'>
	     : ".$value['nama_kegiatan']."
	    </div>

	    <div class='col-xs-12'><br></div>

	    <div class='col-xs-3'>
	        <b>Jenis Kegiatan</b>
	    </div>
	    <div class='col-xs-9'>
	     : ".$value['jenis_kegiatan']."
	    </div>

	    <div class='col-xs-12'><br></div>

	    <div class='col-xs-3'>
	        <b>Penanggung Jawab Kegiatan</b>
	    </div>
	    <div class='col-xs-9'>
	     : ".$infoNameUser."
	    </div>

	    <div class='col-xs-12'><br></div>

	    <div class='col-xs-3'>
	        <b>Waktu Mulai Kegiatan</b>
	    </div>
	    <div class='col-xs-9'>
	     : ".$value['waktu_mulai_kegiatan']."
	    </div>

	    <div class='col-xs-12'><br></div>

	    <div class='col-xs-3'>
	        <b>Waktu Selesai Kegiatan</b>
	    </div>
	    <div class='col-xs-9'>
	     : ".$value['waktu_selesai_kegiatan']."
	    </div>

	    <div class='col-xs-12'><br></div>

	    <div class='col-xs-3'>
	        <b>Tempat Kegiatan</b>
	    </div>
	    <div class='col-xs-9'>
	     : ".$value['tempat_kegiatan']."
	    </div>

	    <div class='col-xs-12'><br></div>

	    <div class='col-xs-3'>
	        <b>Deskripsi Kegiatan</b>
	    </div>
	    <div class='col-xs-9'>
	     : ".$value['deskripsi_kegiatan']."
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
