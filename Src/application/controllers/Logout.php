<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
	  
    public function index(){
		$this->session->unset_userdata('login');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('kode_dojo');
		$this->session->unset_userdata('nama_dojo');
		$data = array(
			'page' => 'home',
			'link' => 'home'
		);	
		
		$this->load->view('template/wrapper', $data);
    }
	
}