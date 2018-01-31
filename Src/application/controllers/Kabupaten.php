<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kabupaten extends CI_Controller {
    
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

            if($_SESSION['level'] == 6 || $_SESSION['level'] == 5 || $_SESSION['level'] == 3){
                $listKabupaten = $this->Model->list_data_all('tbl_kabupaten_kota')->result_array();
		    	
				$data = array(
					'listKabupaten' => $listKabupaten,
					'page' => 'view_kabupaten',
					'link' => 'view_kabupaten'
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

            if($_SESSION['level'] == 6 || $_SESSION['level'] == 5 || $_SESSION['level'] == 3){
                $listProvinsi = $this->Model->list_data_all('tbl_provinsi')->result_array();
                $data = array(
                    'listProvinsi' => $listProvinsi,
                    'page' => 'tambah_kabupaten',
                    'link' => 'tambah_kabupaten'
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

            if($_SESSION['level'] == 6 || $_SESSION['level'] == 5 || $_SESSION['level'] == 3){
                $validator = $this->Model->ambil('nama_kabupaten_kota',$inputNamaKabupaten,'tbl_kabupaten_kota')->result_array();

                $kode_kabupaten_kota = $this->getUniqueID('kode_kabupaten_kota','tbl_kabupaten_kota')+1;

                if($validator == null && $inputNamaKabupaten != null){

                    $dataInsert = array(
                        'kode_kabupaten_kota' => $kode_kabupaten_kota, 
                        'kode_provinsi' => $inputProvinsi, 
                        'nama_kabupaten_kota' => $inputNamaKabupaten
                    );

                    $queryInsert = $this->Model->simpan_data($dataInsert,'tbl_kabupaten_kota');

                    $alert = "<script>
                                alert('Input Success!!');
                                window.location.href='".base_url()."index.php/kabupaten/tambah';
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
                                window.location.href='".base_url()."index.php/kabupaten/tambah';
                                </script>";
                    $data = array(
                        'alert' => $alert,
                        'page' => 'notification',
                        'link' => 'tambah_kabupaten'
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

    public function editKabupaten(){

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

            if($_SESSION['level'] == 6 || $_SESSION['level'] == 5 || $_SESSION['level'] == 3){
               
                $queryKabupaten = $this->Model->ambil("kode_kabupaten_kota",$id,"tbl_kabupaten_kota")->result_array();

                $listProvinsi = $this->Model->list_data_all('tbl_provinsi')->result_array();

                $data = array(
                    'listProvinsi' =>$listProvinsi,
                    'infoKabupaten' => $queryKabupaten,
                    'page' => 'view_kabupaten',
                    'link' => 'view_kabupaten'
                );  
                
                $this->load->view('ajaxEditKabupaten', $data);
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

    public function updateKabupaten(){

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

            if($_SESSION['level'] == 6 || $_SESSION['level'] == 5 || $_SESSION['level'] == 3){
               $dataUpdate = array(
                    'kode_kabupaten_kota' => $inputKode, 
                    'kode_provinsi' => $inputProvinsi, 
                    'nama_kabupaten_kota' => $inputNamaKabupaten
                );

               $queryUpdate = $this->Model->update("kode_kabupaten_kota",$inputKode,"tbl_kabupaten_kota",$dataUpdate);

                $alert = "<script>
                            alert('Update Success!!');
                            window.location.href='".base_url()."index.php/kabupaten';
                            </script>";
                $data = array(
                    'alert' => $alert,
                    'page' => 'notification',
                    'link' => 'tambah_kabupaten'
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