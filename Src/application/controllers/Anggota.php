<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {
    
    public function index(){

    	$listAnggota = $this->Model->list_data_all("tbl_user")->result_array();
    	
		$data = array(
			'listAnggota' => $listAnggota,
			'page' => 'view_anggota',
			'link' => 'view_anggota'
		);	
		
		$this->load->view('template/wrapper', $data);
    }

    public function tambah(){

    	$listJabatan = array('Anggota',
    						'Admin',
    						'Asisten',
    						'Bendahara',
    						'Ketua Dojo',
    						'Pelatih',
    						'Pelatih Utama',
    						'Sekretaris');

    	$listTingkatan = array('KYU VI',
    						'KYU V',
    						'KYU IV',
    						'KYU III',
    						'KYU II',
    						'KYU I',
    						'DAN I',
    						'DAN II',
    						'DAN III',
    						'DAN IV',
    						'DAN V');
    	$listAtlit = array('Bukan Atlit',
    						'Atlit Kabupaten',
    						'Atlit Provinsi',
    						'Atlit Nasional');
    	$listJuri = array('Bukan Juri',
    						'Juri Kabupaten',
    						'Juri Provinsi',
    						'Juri Nasional');

    	$listAnggota = $this->Model->list_data_all("tbl_user")->result_array();
    	$queryDojo = $this->Model->ambil("kode_dojo",$_SESSION['kode_dojo'],"tbl_dojo")->result_array();
		$data = array(
			'listJabatan' => $listJabatan,
			'listTingkatan' =>$listTingkatan,
			'listAtlit' => $listAtlit,
			'listJuri' => $listJuri,
			'listAnggota' => $listAnggota,
			'dataDojo' => $queryDojo,
			'page' => 'tambah_anggota',
			'link' => 'tambah_anggota'
		);	
		
		$this->load->view('template/wrapper', $data);
    }

    public function proses(){
    	extract($_POST);

    	$listAnggota = $this->Model->list_data_all("tbl_user")->result_array();
    	$username = md5($inputUsername);
    	$password = md5($inputPassword);
    	$alert = null;

    	$level = 0;
    	if($inputJabatan=='Anggota'){
    		$level = 1;
    	}else if($inputJabatan=='Admin'){
    		$level = 2;
    	}else if($inputJabatan=='Asisten'){
    		$level = 3;
    	}else if($inputJabatan=='Bendahara'){
    		$level = 4;
    	}else if($inputJabatan=='Ketua Dojo'){
    		$level = 5;
    	}else if($inputJabatan=='Pelatih'){
    		$level = 6;
    	}else if($inputJabatan=='Pelatih Utama'){
    		$level = 7;
    	}else if($inputJabatan=='Sekretaris'){
    		$level = 8;
    	}

    	$id = $this->getUniqueID($level);
    	$validator = true;
    	foreach ($listAnggota as $key => $value) {
    		# code...
    		if($value['username']==$username){
				$alert = "<script>
							alert('Username Already Exist!!');
							window.location.href='".base_url()."index.php/anggota/tambah';
							</script>";
				$data = array(
					'alert' => $alert,
					'page' => 'notification',
					'link' => 'tambah_anggota'
				);	
				
				$this->load->view('template/wrapper', $data);
    		}
    	}

    	
    	$dataInsert = array('id' => $id,
					    	'nama' => $inputNama,
					    	'status' => 'aktif',
					    	'level' => $level,
					    	'username' => $username,
					    	'password' => $password,
							'kode_dojo' => $inputDojo,
							'tingkatan' => $inputTingkatan,
							'atlit' => $inputAtlit,
							'juri' => $inputJuri,
							'jabatan' => $inputJabatan);

    	#$queryInsert = $this->Model->simpan_data($dataInsert,'tbl_user');
    	
    }

    function getUniqueID($level){
    	#fuction to get unique ID for tbl_user
		$maxID = 0;
    	if($level != 0){
    		$maxID = $this->Model->maxWhere('id','level',$level,'tbl_user	');
    	}

    	$strID = substr($maxID, 1); #return string max value of users in the level ex : id = 12, will return 2
    	$intID = (int) $strID + 1; #return possible int value to make an unique id 
    	$result = $level.$intID; #return final unique id
    	return (int) $result;
    }
	
}