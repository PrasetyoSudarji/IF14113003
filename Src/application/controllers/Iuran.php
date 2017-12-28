<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iuran extends CI_Controller {
    
    public function index(){
    	$listIuran = $this->Model->list_data_all('tbl_iuran')->result_array();
    	$listAnggota = $this->Model->list_data_all("tbl_user")->result_array();
    	
		$data = array(
			'listAnggota' =>$listAnggota,
			'listIuran' => $listIuran,
			'page' => 'iuran',
			'link' => 'iuran'
		);	
		
		$this->load->view('template/wrapper', $data);
    }

    public function pembayaran(){
    	$listAnggota = $this->Model->list_data_all("tbl_user")->result_array();
    	$queryDojo = $this->Model->ambil("kode_dojo",$_SESSION['kode_dojo'],"tbl_dojo")->result_array();

    	$data = array(
    		'listAnggota' =>$listAnggota,
    		'dataDojo' =>$queryDojo,
			'page' => 'pembayaranIuran',
			'link' => 'pembayaranIuran'
		);	
		
		$this->load->view('template/wrapper', $data);	
    }

    public function proses(){
    	extract($_POST);

    	$queryKodeIuran = $this->Model->max('kode_iuran','tbl_iuran') + 1;

    	$date = date_format(date_create($inputWaktuPembayaran),'Y-m-d');

    	$queryIuran = $this->Model->ambil("id_anggota",$inputId,"tbl_iuran")->result_array();

    	$validator = true;

    	$month1 = date('n',strtotime($date));

    	foreach ($queryIuran as $key => $value) {
    		# code...
    		$month2 = date('n',strtotime($value['waktu_iuran']));
    		if($month1 == $month2){
    			$validator = false;
    		}
    	}

    	if($validator){
    		$dataInsert = array('kode_iuran' => $queryKodeIuran,
						    	'id_anggota' => $inputId,
						    	'kode_dojo' => $inputDojo,
						    	'besaran_iuran' => $inputBesaranPembayaran,
						    	'waktu_iuran' => $date);

	    	$queryInsert = $this->Model->simpan_data($dataInsert,'tbl_iuran');

			$alert = "<script>
					alert('Input Success !!');
					window.location.href='".base_url()."index.php/iuran/pembayaran';
					</script>";
			$data = array(
				'alert' => $alert,
				'page' => 'notification',
				'link' => 'pembayaranIuran'
			);
			$this->load->view('template/wrapper', $data);
		}else{
			$alert = "<script>
					alert('Anggota ini telah membayar iuran !!');
					window.location.href='".base_url()."index.php/iuran/pembayaran';
					</script>";
			$data = array(
				'alert' => $alert,
				'page' => 'notification',
				'link' => 'pembayaranIuran'
			);
			$this->load->view('template/wrapper', $data);
		}
		
    }
	
}