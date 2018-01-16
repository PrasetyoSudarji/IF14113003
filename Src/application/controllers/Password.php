<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password extends CI_Controller {
	  
    public function forget(){
		$alert = "<script>
		alert('Please check your e-mail to get your new password !!');
		window.location.href='".base_url()."';
		</script>";
		$data = array(
			'alert' => $alert,
			'page' => 'notification',
			'link' => 'home'
		);

		$this->load->view('template/wrapper', $data);
    }

    public function change(){
		
		$data = array(
			
			'page' => 'change_password',
			'link' => 'change_password'
		);

		$this->load->view('template/wrapper', $data);
    }
	
}