<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratEdaran extends CI_Controller {
    
    public function index(){
    	
		$data = array(
			'page' => 'lihat_surat_edaran',
			'link' => 'lihat_surat_edaran'
		);	
		
		$this->load->view('template/wrapper', $data);
    }

    public function tambah(){
    	
		$data = array(
			'page' => 'tambah_surat_edaran',
			'link' => 'tambah_surat_edaran'
		);	
		
		$this->load->view('template/wrapper', $data);
    }
	
}