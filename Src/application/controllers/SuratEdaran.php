<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratEdaran extends CI_Controller {
    
    public function index(){
    	
		$data = array(
			'page' => 'surat_edaran',
			'link' => 'surat_edaran'
		);	
		
		$this->load->view('template/wrapper', $data);
    }
	
}