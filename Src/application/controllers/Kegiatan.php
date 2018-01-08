<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {
    
    public function index(){
    	if(!$this->session->has_userdata('login')){
            $alert = "<script>
                    alert('Access ditolak !!');
                    window.location.href='".base_url()."';
                    </script>";
            $data = array(
                'alert' => $alert,
                'page' => 'notification',
                'link' => 'home'
            );  
        
            $this->load->view('template/wrapper', $data);
        }else{
	    	$queryKegiatan = $this->Model->list_data_all("tbl_kegiatan")->result_array();
			$data = array(
				'listKegiatan' =>$queryKegiatan,
				'page' => 'lihat_kegiatan',
				'link' => 'lihat_kegiatan'
			);	
			
			$this->load->view('template/wrapper', $data);
		}
    }

    public function view(){
    	if(!$this->session->has_userdata('login')){
            $alert = "<script>
                    alert('Access ditolak !!');
                    window.location.href='".base_url()."';
                    </script>";
            $data = array(
                'alert' => $alert,
                'page' => 'notification',
                'link' => 'home'
            );  
        
            $this->load->view('template/wrapper', $data);
        }else{
	    	extract($_GET);
	    	$queryKegiatan = $this->Model->ambil("kode_kegiatan",$id,"tbl_kegiatan")->result_array();
	    	$nameUser = null;
	    	foreach ($queryKegiatan as $key => $value) {
	    		# code...
	    		$queryUser = $this->Model->ambil("id",$value['id_penanggung_jawab'],"tbl_user")->result_array();
	    		foreach ($queryUser as $key => $value2) {
	    			# code...
	    			$nameUser = $value2['nama'];
	    		}
	    	}
	    	
			$data = array(
				'infoNameUser' => $nameUser,
				'infoKegiatan' =>$queryKegiatan,
				'page' => 'lihat_kegiatan',
				'link' => 'lihat_kegiatan'
			);	
			
			$this->load->view('ajaxViewKegiatan', $data);
		}
    }

    public function tambah(){
    	if(!$this->session->has_userdata('login')){
            $alert = "<script>
                    alert('Access ditolak !!');
                    window.location.href='".base_url()."';
                    </script>";
            $data = array(
                'alert' => $alert,
                'page' => 'notification',
                'link' => 'home'
            );  
        
            $this->load->view('template/wrapper', $data);
        }else{

            if($_SESSION['level'] != 2){
                $alert = "<script>
                    alert('Access ditolak !!');
                    window.location.href='".base_url()."';
                    </script>";
                $data = array(
                    'alert' => $alert,
                    'page' => 'notification',
                    'link' => 'home'
                );  
            
                $this->load->view('template/wrapper', $data);
            }else{
		    	$listAnggota = $this->Model->list_data_all("tbl_user")->result_array();
		    	$queryDojo = $this->Model->ambil("kode_dojo",$_SESSION['kode_dojo'],"tbl_dojo")->result_array();

		    	$listJenis = array('Latihan',
		    						'Kejuaraan',
		    						'Gashuku');

		    	$listLevel = array('Dojo',
		    						'Kabupaten/Kota',
		    						'Provinsi',
		    						'Nasional');

				$data = array(
					'listLevel' => $listLevel,
					'listJenis' => $listJenis,
					'listDojo' => $queryDojo,
					'listAnggota' => $listAnggota,
					'page' => 'tambah_kegiatan',
					'link' => 'tambah_kegiatan'
				);	
				
				$this->load->view('template/wrapper', $data);
			}
		}
    }

    public function proses(){
    	if(!$this->session->has_userdata('login')){
            $alert = "<script>
                    alert('Access ditolak !!');
                    window.location.href='".base_url()."';
                    </script>";
            $data = array(
                'alert' => $alert,
                'page' => 'notification',
                'link' => 'home'
            );  
        
            $this->load->view('template/wrapper', $data);
        }else{

            if($_SESSION['level'] != 2){
                $alert = "<script>
                    alert('Access ditolak !!');
                    window.location.href='".base_url()."';
                    </script>";
                $data = array(
                    'alert' => $alert,
                    'page' => 'notification',
                    'link' => 'home'
                );  
            
                $this->load->view('template/wrapper', $data);
            }else{

		    	extract($_POST);

		    	$kode_kegiatan = $this->getUniqueID() + 1;

		    	$dataInsert = array(
					'kode_kegiatan' => $kode_kegiatan,
					'nama_kegiatan' => $inputNama,
					'kode_dojo' => $inputDojo,
					'waktu_mulai_kegiatan' => $inputWaktuMulai,
					'waktu_selesai_kegiatan' => $inputWaktuSelesai,
					'tempat_kegiatan' => $inputTempat,
					'level_kegiatan' => $inputLevel,
					'biaya_kegiatan' => $inputBiaya,
					'id_penanggung_jawab' => $inputId,
					'deskripsi_kegiatan' => $inputDeskripsi
				);

				$queryInsert = $this->Model->simpan_data($dataInsert,'tbl_kegiatan');
				
				$alert = "<script>
							alert('Input Success!!');
							window.location.href='".base_url()."index.php/kegiatan/tambah';
							</script>";
				$data = array(
					'alert' => $alert,
					'page' => 'notification',
					'link' => 'tambah_kegiatan'
				);	

				$this->load->view('template/wrapper', $data);
			}
		}
    }

    function getUniqueID(){
    	#fuction to get unique ID for tbl_user
		
    	$maxID = $this->Model->maxFrom('kode_kegiatan','tbl_kegiatan');
    	
    	return (int) $maxID;
    }
	
}