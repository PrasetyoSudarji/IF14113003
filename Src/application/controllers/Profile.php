<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	  
    public function index(){
		
		$data = array(
			'page' => 'profile',
			'link' => 'profile'
		);

		$this->load->view('template/wrapper', $data);
    }
	
}