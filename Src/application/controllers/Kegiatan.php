<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {
    
    public function index(){
    	$queryKegiatan = $this->Model->list_data_all("tbl_kegiatan")->result_array();
		$data = array(
			'listKegiatan' =>$queryKegiatan,
			'page' => 'lihat_kegiatan',
			'link' => 'lihat_kegiatan'
		);	
		
		$this->load->view('template/wrapper', $data);
    }

    public function tambah(){
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