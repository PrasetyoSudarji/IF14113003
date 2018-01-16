<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dojo extends CI_Controller {
    
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

            if($_SESSION['level'] == 3){
                $listDojo = $this->Model->ambil('kode_kabupaten_kota',$_SESSION['kode_kabupaten_kota'],'tbl_dojo')->result_array();
		    	$listUser = $this->Model->list_data_all('tbl_user')->result_array();
		    	
				$data = array(
					'listUser' => $listUser,
					'listDojo' => $listDojo,
					'page' => 'view_dojo',
					'link' => 'view_dojo'
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

            if($_SESSION['level'] == 3){

         		$data = array(
					'page' => 'tambah_dojo',
					'link' => 'tambah_dojo'
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

    public function prosesTambah(){
		
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

            if($_SESSION['level'] == 3){

            	extract($_POST);

            	$kode_dojo = $this->getUniqueID('kode_dojo','tbl_dojo') + 1;

            	$dataInsert = array(
            		'kode_dojo' => $kode_dojo,
            		'kode_kabupaten_kota' => $_SESSION['kode_kabupaten_kota'],
            		'nama_dojo' => $inputNama
            	);

            	$queryInsert = $this->Model->simpan_data($dataInsert,'tbl_dojo');

         		$alert = "<script>
							alert('Input Success!!');
							window.location.href='".base_url()."index.php/dojo/tambah';
							</script>";
				$data = array(
					'alert' => $alert,
					'page' => 'notification',
					'link' => 'tambah_dojo'
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

    function getUniqueID($id,$table){
    	#fuction to get unique ID for tbl_user
        
        $maxID = $this->Model->maxFrom($id,$table);
        
        return (int) $maxID;
    }
	
}