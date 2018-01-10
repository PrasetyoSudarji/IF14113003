<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {
    
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
            $listAnggota = $this->Model->list_data_all("tbl_user")->result_array();
        
            $data = array(
                'listAnggota' => $listAnggota,
                'page' => 'view_anggota',
                'link' => 'view_anggota'
            );  
            
            $this->load->view('template/wrapper', $data);
        }
    }

    public function viewKabupatenKota(){

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

            if($_SESSION['level'] != 3){
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
                
                $data = array(
                    'listAnggota' => $listAnggota,
                    'page' => 'view_anggota_kabupaten',
                    'link' => 'view_anggota_kabupaten'
                );  
                
                $this->load->view('template/wrapper', $data);
            }
        }
    }

    public function viewProvinsi(){

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

            if($_SESSION['level'] != 4){
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
                
                $data = array(
                    'listAnggota' => $listAnggota,
                    'page' => 'view_provinsi',
                    'link' => 'view_provinsi'
                );  
                
                $this->load->view('template/wrapper', $data);
            }
        }
    }

    public function viewNasional(){

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

            if($_SESSION['level'] != 5){
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
                
                $data = array(
                    'listAnggota' => $listAnggota,
                    'page' => 'view_nasional',
                    'link' => 'view_nasional'
                );  
                
                $this->load->view('template/wrapper', $data);
            }
        }
    }

    public function viewUser(){
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
    }

    
    public function pindah(){
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

            if($_SESSION['jabatan'] == 'Admin' || $_SESSION['jabatan'] == 'Ketua'){
                $listAnggota = $this->Model->list_data_all("tbl_user")->result_array();
                $listDojo = $this->Model->list_data_all('tbl_dojo')->result_array();
                
                $data = array(
                    'listAnggota' => $listAnggota,
                    'listDojo' =>$listDojo,
                    'page' => 'pindah_anggota',
                    'link' => 'pindah_anggota'
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

    public function viewRequestPindah(){

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

            if($_SESSION['jabatan'] == 'Admin' || $_SESSION['jabatan'] == 'Ketua'){
                $listRequest = $this->Model->list_data_all('tbl_perpindahan')->result_array();
                
                $data = array(
                    'listRequest' => $listRequest,
                    'page' => 'lihat_request_perpindahan',
                    'link' => 'lihat_request_perpindahan'
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

    public function prosesPindah(){

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

            if($_SESSION['jabatan'] == 'Admin' || $_SESSION['jabatan'] == 'Ketua'){
                extract($_POST);

                $kode_perpindahan = $this->getUniqueID('kode_perpindahan','tbl_perpindahan') + 1;
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

    public function terimaPerpindahan(){
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

            if($_SESSION['jabatan'] == 'Admin' || $_SESSION['jabatan'] == 'Ketua'){
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

    public function tolakPerpindahan(){
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

            if($_SESSION['jabatan'] == 'Admin' || $_SESSION['jabatan'] == 'Ketua'){
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

    public function request(){
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

            if($_SESSION['jabatan'] == 'Admin' || $_SESSION['jabatan'] == 'Ketua'){
                
                $listRequest = $this->Model->list_data_all('tbl_request')->result_array();

                $data = array(
                    'listRequest' => $listRequest,
                    'page' => 'lihat_request_anggota',
                    'link' => 'lihat_request_anggota'
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

    public function prosesRequest(){
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
            $id = $this->getUniqueID('kode_request','tbl_request')+1;
                
            $dataInsert = array(
                'kode_request' => $id,
                'id_anggota' => $_SESSION['login'],
                'kode_dojo' => $inputDojo,
                'status_request' => 'Menunggu Persetujuan'
            );

            $queryInsert = $this->Model->simpan_data($dataInsert,'tbl_request');   
            $alert = "<script>
                        alert('Request Success!!');
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

    public function terimaAnggota(){
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

            if($_SESSION['jabatan'] == 'Admin' || $_SESSION['jabatan'] == 'Ketua'){
                extract($_GET);

                $infoUser = null;

                $queryRequest = $this->Model->ambil('kode_request',$id,'tbl_request')->result_array();
                foreach ($queryRequest as $key => $value) {
                    # code...
                    $dataUpdate = array(
                        'status' => 'active',
                        'kode_dojo' => $value['kode_dojo'],
                        'jabatan' => 'Anggota'
                     );

                    $queryUpdate = $this->Model->update("id",$value['id_anggota'],"tbl_user",$dataUpdate);

                    $dataUpdate2 = array(
                        'status_request' => 'Diterima'
                     );

                    $queryUpdate2 = $this->Model->update("kode_request",$value['kode_request'],"tbl_request",$dataUpdate2);
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

    public function tolakAnggota(){
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

            if($_SESSION['jabatan'] == 'Admin' || $_SESSION['jabatan'] == 'Ketua'){
                
                extract($_GET);

                $infoUser = null;

                $queryRequest = $this->Model->ambil('kode_request',$id,'tbl_request')->result_array();
                foreach ($queryRequest as $key => $value) {
                    # code...

                    $dataUpdate = array(
                        'status_request' => 'Ditolak'
                     );

                    $queryUpdate = $this->Model->update("kode_request",$value['kode_request'],"tbl_request",$dataUpdate);
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

    public function updateTingkatan(){
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

            $dataUpdate = array(
                'tingkatan' => $inputTingkatan
            );

            $queryUpdate = $this->Model->update("id",$_SESSION['login'],"tbl_user",$dataUpdate);

            $alert = "<script>
                        alert('Update Profile Success!!');
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

    public function editByKabKot(){ #this function used by admin kabupaten kota

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

            if($_SESSION['level'] != 3){
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
                
                $this->load->view('ajaxEdit', $data);
            }
        }
    }

    public function editUser(){ #this function used by admin dojo

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

            if($_SESSION['jabatan'] == 'Admin' || $_SESSION['jabatan'] == 'Ketua'){
               
                extract($_GET);

                $listJabatan = array('Admin',
                                    'Anggota',
                                    'Asisten',
                                    'Bendahara',
                                    'Ketua',
                                    'Pelatih',
                                    'Sekretaris',
                                );

                $queryUser = $this->Model->ambil("id",$id,"tbl_user")->result_array();

                $data = array(
                    'listJabatan' => $listJabatan,
                    'infoUser' => $queryUser,
                    'page' => 'edit_anggota_kabupaten',
                    'link' => 'view_anggota_kabupaten'
                );  
                
                $this->load->view('ajaxEditUser', $data);
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

    public function updateByKabKot(){
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

            if($_SESSION['level'] != 3){
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
        }   
    }

    public function updateUserByAdmin(){
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

            if($_SESSION['jabatan'] == 'Admin' || $_SESSION['jabatan'] == 'Ketua'){
                extract($_POST);

                $dataUpdate = array(
                    'jabatan' =>$inputJabatan,
                );  

                $queryUpdate = $this->Model->update("id",$inputId,"tbl_user",$dataUpdate);

                $alert = "<script>
                            alert('Update Success!!');
                            window.location.href='".base_url()."index.php/anggota/';
                            </script>";
                $data = array(
                        'alert' => $alert,
                        'page' => 'notification',
                        'link' => 'view_anggota'
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