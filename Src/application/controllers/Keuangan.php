<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends CI_Controller {
    
    public function index(){
    	
		$data = array(
			'page' => 'rekapitulasi',
			'link' => 'rekapitulasi'
		);	
		
		$this->load->view('template/wrapper', $data);
    }
	
}