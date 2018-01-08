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

    public function viewKabupatenKota(){

        $listAnggota = $this->Model->list_data_all("tbl_user")->result_array();
        
        $data = array(
            'listAnggota' => $listAnggota,
            'page' => 'view_anggota_kabupaten',
            'link' => 'view_anggota_kabupaten'
        );  
        
        $this->load->view('template/wrapper', $data);
    }

    public function viewProvinsi(){

        $listAnggota = $this->Model->list_data_all("tbl_user")->result_array();
        
        $data = array(
            'listAnggota' => $listAnggota,
            'page' => 'view_provinsi',
            'link' => 'view_provinsi'
        );  
        
        $this->load->view('template/wrapper', $data);
    }

    public function viewNasional(){

        $listAnggota = $this->Model->list_data_all("tbl_user")->result_array();
        
        $data = array(
            'listAnggota' => $listAnggota,
            'page' => 'view_nasional',
            'link' => 'view_nasional'
        );  
        
        $this->load->view('template/wrapper', $data);
    }

    public function viewUser(){
        extract($_GET);

        $queryUser = $this->Model->ambil("id",$id,"tbl_user")->result_array();
        $infoDojoName = null;

        foreach ($queryUser as $key => $value) {
            # code...
            $queryDojo = $this->Model->ambil("kode_dojo",$value['kode_dojo'],"tbl_dojo")->result_array();
            foreach ($queryDojo as $key => $value2) {
                # code...
                $infoDojoName = $value2['nama_dojo'];
            }
        }
        
        $data = array(
            'infoUser' => $queryUser,
            'infoDojoName' => $infoDojoName,
            'page' => 'view_anggota',
            'link' => 'view_anggota'
        );  
        
        $this->load->view('ajaxViewUser', $data);
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
    	
		$data = array(
			'listJabatan' => $listJabatan,
			'listTingkatan' =>$listTingkatan,
			'page' => 'tambah_anggota',
			'link' => 'tambah_anggota'
		);	
		
		$this->load->view('template/wrapper', $data);
    }

    public function pindah(){

        $listAnggota = $this->Model->list_data_all("tbl_user")->result_array();
        $listDojo = $this->Model->list_data_all('tbl_dojo')->result_array();
        
        $data = array(
            'listAnggota' => $listAnggota,
            'listDojo' =>$listDojo,
            'page' => 'pindah_anggota',
            'link' => 'pindah_anggota'
        );  
        
        $this->load->view('template/wrapper', $data);
    }

    public function viewRequestPindah(){

        $listRequest = $this->Model->list_data_all('tbl_perpindahan')->result_array();
        
        $data = array(
            'listRequest' => $listRequest,
            'page' => 'lihat_request_perpindahan',
            'link' => 'lihat_request_perpindahan'
        );  
        
        $this->load->view('template/wrapper', $data);
    }

    public function prosesPindah(){

        extract($_POST);

        $kode_perpindahan = $this->getUniqueIDPerpindahan() + 1;
        $kode_dojo_asal = null;

        $queryUser = $this->Model->ambil('id',$inputId,'tbl_user')->result_array();
        foreach ($queryUser as $key => $value) {
            # code...
            $kode_dojo_asal = $value['kode_dojo'];
        }

        $dataInsert = array(
            'kode_perpindahan' => $kode_perpindahan,
            'id_anggota' => $inputId,
            'kode_dojo_asal' => $kode_dojo_asal,
            'kode_dojo_tujuan' => $inputDojo,
            'status_perpindahan' => 'Menunggu Persetujuan'
         );

        $queryInsert = $this->Model->simpan_data($dataInsert,'tbl_perpindahan');  
        
        $alert = "<script>
                    alert('Request berhasil di ajukan');
                    window.location.href='".base_url()."index.php/anggota/pindah';
                    </script>";
        $data = array(
            'alert' => $alert,
            'page' => 'notification',
            'link' => 'pindah_anggota'
        );  
        
        $this->load->view('template/wrapper', $data);
    }

    public function terimaPerpindahan(){

        extract($_GET);

        $infoUser = null;

        $queryPerpindahan = $this->Model->ambil('kode_perpindahan',$id,'tbl_perpindahan')->result_array();
        foreach ($queryPerpindahan as $key => $value) {
            # code...
            $dataUpdate = array(
                'kode_dojo' => $value['kode_dojo_tujuan']
             );

            $queryUpdate = $this->Model->update("id",$value['id_anggota'],"tbl_user",$dataUpdate);

            $dataUpdate2 = array(
                'status_perpindahan' => 'Diterima'
             );

            $queryUpdate2 = $this->Model->update("kode_perpindahan",$value['kode_perpindahan'],"tbl_perpindahan",$dataUpdate2);
        }

        $alert = "<script>
                alert('Request berhasil disetujui!!');
                window.location.href='".base_url()."index.php/anggota/viewRequestPindah';
                </script>";
        $data = array(
            'alert' => $alert,
            'page' => 'lihat_request_perpindahan',
            'link' => 'pindah_anggota'
        );  
            
        $this->load->view('notification', $data);
    }

    public function tolakPerpindahan(){

        extract($_GET);

        $infoUser = null;

        $queryPerpindahan = $this->Model->ambil('kode_perpindahan',$id,'tbl_perpindahan')->result_array();
        foreach ($queryPerpindahan as $key => $value) {
            # code...

            $dataUpdate = array(
                'status_perpindahan' => 'Ditolak'
             );

            $queryUpdate = $this->Model->update("kode_perpindahan",$value['kode_perpindahan'],"tbl_perpindahan",$dataUpdate);
        }

        $alert = "<script>
                alert('Request berhasil ditolak!!');
                window.location.href='".base_url()."index.php/anggota/viewRequestPindah';
                </script>";
        $data = array(
            'alert' => $alert,
            'page' => 'lihat_request_perpindahan',
            'link' => 'pindah_anggota'
        );  
            
        $this->load->view('notification', $data);
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

        if($inputPassword != $inputPasswordConfirm){
            $alert = "<script>
                        alert('Password does not match!!');
                        window.location.href='".base_url()."index.php/anggota/tambah';
                        </script>";
            $data = array(
                'alert' => $alert,
                'page' => 'notification',
                'link' => 'tambah_anggota'
            );  
            
            $this->load->view('template/wrapper', $data);
        }else{
            
            $dataInsert = array('id' => $id,
                            'nama' => $inputNama,
                            'status' => 'aktif',
                            'level' => $level,
                            'username' => $username,
                            'password' => $password,
                            'kode_dojo' => $_SESSION['kode_dojo'],
                            'kode_kabupaten_kota' => null,
                            'kode_provinsi' => null,
                            'kode_negara' => null,
                            'tingkatan' => $inputTingkatan,
                            'atlit' => null,
                            'juri' => null,
                            'jabatan' => $inputJabatan);

            $queryInsert = $this->Model->simpan_data($dataInsert,'tbl_user');   
            $alert = "<script>
                        alert('Input Success!!');
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

    public function edit(){
        extract($_GET);

        $listAtlit = array('Bukan Atlit',
                            'Atlit Kabupaten',
                            'Atlit Provinsi',
                            'Atlit Nasional');
        $listJuri = array('Bukan Juri',
                            'Juri Kabupaten',
                            'Juri Provinsi',
                            'Juri Nasional');

        $queryUser = $this->Model->ambil("id",$id,"tbl_user")->result_array();

        $data = array(
            'listJuri' => $listJuri,
            'listAtlit' =>$listAtlit,
            'infoUser' => $queryUser,
            'page' => 'edit_anggota_kabupaten',
            'link' => 'view_anggota_kabupaten'
        );  
        
        $this->load->view('ajaxEditUser', $data);
    }

    public function update(){
        extract($_POST);

        $dataUpdate = array(
            'atlit' => $inputAtlit,
            'juri' =>$inputJuri,
        );  

        $queryUpdate = $this->Model->update("id",$inputId,"tbl_user",$dataUpdate);

        $alert = "<script>
                    alert('Update Success!!');
                    window.location.href='".base_url()."index.php/anggota/viewKabupatenKota';
                    </script>";
        $data = array(
                'alert' => $alert,
                'page' => 'notification',
                'link' => 'view_anggota_kabupaten'
            );  
            
            $this->load->view('template/wrapper', $data);
    }

    function getUniqueID($level){
    	#fuction to get unique ID for tbl_user
		$maxID = 0;
    	if($level != 0){
    		$maxID = $this->Model->maxWhere('id','level',$level,'tbl_user');
    	}

    	$strID = substr($maxID, 1); #return string max value of users in the level ex : id = 12, will return 2
    	$intID = (int) $strID + 1; #return possible int value to make an unique id 
    	$result = $level.$intID; #return final unique id
    	return (int) $result;
    }

    function getUniqueIDPerpindahan(){
        #fuction to get unique ID for tbl_user
        
        $maxID = $this->Model->maxFrom('kode_perpindahan','tbl_perpindahan');
        
        return (int) $maxID;
    }
	
}