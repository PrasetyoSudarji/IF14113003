<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {
    
    public function index(){
    	$queryKegiatan = $this->Model->list_data_all("tbl_kegiatan")->result_array();
		$data = array(
			'listKegiatan' =>$queryKegiatan,
			'page' => 'kegiatan',
			'link' => 'kegiatan'
		);	
		
		$this->load->view('template/wrapper', $data);
    }
	
}