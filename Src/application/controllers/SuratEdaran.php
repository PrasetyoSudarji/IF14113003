<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratEdaran extends CI_Controller {
    
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

        	$querySuratEdaran = $this->Model->list_data_all('tbl_surat')->result_array();
        	$infoNameUser = null;

        	foreach ($querySuratEdaran as $key => $value) {
        		# code...
        		$queryUser = $this->Model->ambil('id',$value['id_pengirim'],'tbl_user')->result_array();
        		foreach ($queryUser as $key => $value2) {
        			# code...
        			$infoNameUser = $value2['nama'];
        		}
        	}
        	
    		$data = array(
    			'listSuratEdaran' => $querySuratEdaran,
    			'infoNameUser' =>$infoNameUser,
    			'page' => 'lihat_surat',
    			'link' => 'lihat_surat'
    		);	
    		
    		$this->load->view('template/wrapper', $data);
        }
    }

    public function edaran(){
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

        	$querySuratEdaran = $this->Model->list_data_all('tbl_surat')->result_array();
        	$infoNameUser = null;

        	foreach ($querySuratEdaran as $key => $value) {
        		# code...
        		$queryUser = $this->Model->ambil('id',$value['id_pengirim'],'tbl_user')->result_array();
        		foreach ($queryUser as $key => $value2) {
        			# code...
        			$infoNameUser = $value2['nama'];
        		}
        	}
        	
    		$data = array(
    			'listSuratEdaran' => $querySuratEdaran,
    			'infoNameUser' =>$infoNameUser,
    			'page' => 'lihat_edaran',
    			'link' => 'lihat_edaran'
    		);	
    		
    		$this->load->view('template/wrapper', $data);
        }
    }

    public function viewEdaran(){

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

        	$querySuratEdaran = $this->Model->ambil('kode_surat_edaran',$id,'tbl_surat')->result_array();
        	$infoNamePengirim = null;
        	foreach ($querySuratEdaran as $key => $value) {
        		# code...
        		$queryUser = $this->Model->ambil('id',$value['id_pengirim'],'tbl_user')->result_array();
        		foreach ($queryUser as $key => $value2) {
        			# code...
        			$infoNamePengirim = $value2['nama'];
        		}
        	}
        	
    		$data = array(
    			'infoSuratEdaran' =>$querySuratEdaran,
    			'infoNamePengirim' =>$infoNamePengirim,
    			'page' => 'lihat_edaran',
    			'link' => 'lihat_edaran'
    		);	
    		
    		$this->load->view('ajaxViewEdaran', $data);
        }
    }

    public function viewSurat(){

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

            $querySuratEdaran = $this->Model->ambil('kode_surat_edaran',$id,'tbl_surat')->result_array();
            $infoNamePengirim = null;
            foreach ($querySuratEdaran as $key => $value) {
                # code...
                $queryUser = $this->Model->ambil('id',$value['id_pengirim'],'tbl_user')->result_array();
                foreach ($queryUser as $key => $value2) {
                    # code...
                    $infoNamePengirim = $value2['nama'];
                }
            }
            
            $data = array(
                'infoSuratEdaran' =>$querySuratEdaran,
                'infoNamePengirim' =>$infoNamePengirim,
                'page' => 'lihat_surat',
                'link' => 'lihat_surat'
            );  
            
            $this->load->view('ajaxViewSurat', $data);
        }
    }

    public function tambahSurat(){
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

            $listStatus = array( 
                            'Biasa',
                            'Penting' 
                            );

            $listAnggota = $this->Model->list_data_all('tbl_user')->result_array();
            
            $data = array(
                'listAnggota' => $listAnggota,
                'listStatus' => $listStatus,
                'page' => 'tambah_surat',
                'link' => 'tambah_surat'
            );  
            
            $this->load->view('template/wrapper', $data);
        }
    }

    public function tambahEdaran(){
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

            $listStatus = array( 
                            'Biasa',
                            'Penting' 
                            );
            
            $data = array(
                'listStatus' => $listStatus,
                'page' => 'tambah_edaran',
                'link' => 'tambah_edaran'
            );  
            
            $this->load->view('template/wrapper', $data);
           
        }
    }

    public function prosesEdaran(){

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

            if($_SESSION['level'] == 2 || $_SESSION['level'] == 3 || $_SESSION['level'] == 4 || $_SESSION['level'] == 5 || $_SESSION['level'] == 6){
                    extract($_POST);

                $kode_surat_edaran = $this->getUniqueID() + 1;

                $dataInsert = array(
                    'kode_surat_edaran' => $kode_surat_edaran,
                    'judul_surat_edaran' => $inputJudul,
                    'tanggal_surat_edaran' => date('Y-m-d'),
                    'jenis_surat_edaran' => 'Edaran',
                    'status_surat_edaran' => $inputStatus,
                    'perihal' => $inputPerihal,
                    'id_pengirim' => $_SESSION['login'],
                    'id_penerima' => null,
                    'isi_surat_edaran' => $inputIsi,
                );

                $queryInsert = $this->Model->simpan_data($dataInsert,'tbl_surat'); 
                $alert = "<script>
                            alert('Input Success!!');
                            window.location.href='".base_url()."index.php/SuratEdaran/tambahEdaran';
                            </script>";
                $data = array(
                    'alert' => $alert,
                    'page' => 'notification',
                    'link' => 'tambah_edaran'
                );  
                
                $this->load->view('template/wrapper', $data);
            }else{

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
            }
        }
    	
    }

    public function prosesSurat(){

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

            if($_SESSION['level'] == 2 || $_SESSION['level'] == 3 || $_SESSION['level'] == 4 || $_SESSION['level'] == 5 || $_SESSION['level'] == 6){

                extract($_POST);

                $kode_surat_edaran = $this->getUniqueID() + 1;

                $dataInsert = array(
                    'kode_surat_edaran' => $kode_surat_edaran,
                    'judul_surat_edaran' => $inputJudul,
                    'tanggal_surat_edaran' => date('Y-m-d'),
                    'jenis_surat_edaran' => 'Surat',
                    'status_surat_edaran' => $inputStatus,
                    'perihal' => $inputPerihal,
                    'id_pengirim' => $_SESSION['login'],
                    'id_penerima' => $inputPenerima,
                    'isi_surat_edaran' => $inputIsi,
                );

                $queryInsert = $this->Model->simpan_data($dataInsert,'tbl_surat'); 
                $alert = "<script>
                            alert('Input Success!!');
                            window.location.href='".base_url()."index.php/SuratEdaran/tambahEdaran';
                            </script>";
                $data = array(
                    'alert' => $alert,
                    'page' => 'notification',
                    'link' => 'tambah_edaran'
                );  
                
                $this->load->view('template/wrapper', $data);
            }else{
        
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
            }
        }
    }

    function getUniqueID(){
    	#fuction to get unique ID for tbl_user
		
    	$maxID = $this->Model->maxFrom('kode_surat_edaran','tbl_surat');
    	
    	return (int) $maxID;
    }
	
}