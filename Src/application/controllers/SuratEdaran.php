<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratEdaran extends CI_Controller {
    
    public function index(){
    	$queryKegiatan = $this->Model->list_data_all("tbl_kegiatan")->result_array();
		$data = array(
			'listKegiatan' =>$queryKegiatan,
			'page' => 'surat_edaran',
			'link' => 'surat_edaran'
		);	
		
		$this->load->view('template/wrapper', $data);
    }
	
}