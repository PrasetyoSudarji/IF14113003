<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
    
    public function index(){
		$_SESSION['login'] = null;
		$_SESSION['level'] = null;
		$_SESSION['nama'] = null;
		$_SESSION['kode_dojo'] = null;
		$_SESSION['nama_dojo'] = null;
		$data = array(
			'page' => 'home',
			'link' => 'home'
		);	
		
		$this->load->view('template/wrapper', $data);
    }
	
}