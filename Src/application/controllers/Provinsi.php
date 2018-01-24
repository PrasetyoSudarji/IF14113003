<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsi extends CI_Controller {
    
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

            if($_SESSION['level'] == 6 || $_SESSION['level'] == 5 || $_SESSION['level'] == 4){
                $listProvinsi = $this->Model->list_data_all('tbl_provinsi')->result_array();
		    	
				$data = array(
					'listProvinsi' => $listProvinsi,
					'page' => 'view_list_provinsi',
					'link' => 'view_list_provinsi'
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

            if($_SESSION['level'] == 6 || $_SESSION['level'] == 5 || $_SESSION['level'] == 4){
                $listNegara = $this->Model->list_data_all('tbl_negara')->result_array();
                
                $data = array(
                    'listNegara' => $listNegara,
                    'page' => 'tambah_provinsi',
                    'link' => 'tambah_provinsi'
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
            extract($_POST);

            if($_SESSION['level'] == 6 || $_SESSION['level'] == 5 || $_SESSION['level'] == 4){
                $validator = $this->Model->ambil('nama_provinsi',$inputNamaProvinsi,'tbl_provinsi')->result_array();

                $kode_provinsi = $this->getUniqueID('kode_provinsi','tbl_provinsi')+1;

                if($validator == null && $inputNamaProvinsi != null){

                    $dataInsert = array(
                        'kode_provinsi' => $kode_provinsi, 
                        'kode_negara' => $inputNegara, 
                        'nama_provinsi' => $inputNamaProvinsi
                    );

                    $queryInsert = $this->Model->simpan_data($dataInsert,'tbl_provinsi');

                    $alert = "<script>
                                alert('Input Success!!');
                                window.location.href='".base_url()."index.php/provinsi/tambah';
                                </script>";
                    $data = array(
                        'alert' => $alert,
                        'page' => 'notification',
                        'link' => 'tambah_kabupaten'
                    );  

                    $this->load->view('template/wrapper', $data);
                }else{
                    $alert = "<script>
                                alert('Input Failed!!');
                                window.location.href='".base_url()."index.php/provinsi/tambah';
                                </script>";
                    $data = array(
                        'alert' => $alert,
                        'page' => 'notification',
                        'link' => 'tambah_provinsi'
                    );  

                    $this->load->view('template/wrapper', $data);
                }
                
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

    public function editProvinsi(){

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

            if($_SESSION['level'] == 6 || $_SESSION['level'] == 5 || $_SESSION['level'] == 4){
               
                $queryProvinsi = $this->Model->ambil("kode_provinsi",$id,"tbl_provinsi")->result_array();

                $listNegara = $this->Model->list_data_all('tbl_negara')->result_array();

                $data = array(
                    'listNegara' =>$listNegara,
                    'infoProvinsi' => $queryProvinsi,
                    'page' => 'view_list_provinsi',
                    'link' => 'view_list_provinsi'
                );  
                
                $this->load->view('ajaxEditProvinsi', $data);
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

    public function updateProvinsi(){

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
            extract($_POST);

            if($_SESSION['level'] == 6 || $_SESSION['level'] == 5 || $_SESSION['level'] == 4){
               $dataUpdate = array(
                    'kode_provinsi' => $inputKode, 
                    'kode_negara' => $inputNegara, 
                    'nama_provinsi' => $inputNamaProvinsi
                );

               $queryUpdate = $this->Model->update("kode_provinsi",$inputKode,"tbl_provinsi",$dataUpdate);

                $alert = "<script>
                            alert('Update Success!!');
                            window.location.href='".base_url()."index.php/provinsi';
                            </script>";
                $data = array(
                    'alert' => $alert,
                    'page' => 'notification',
                    'link' => 'tambah_provinsi'
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