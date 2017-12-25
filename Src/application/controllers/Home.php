<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$query = $this->Model->ambil("id",$_SESSION['login'],"tbl_user");
		$nameUser = null;
		foreach($query->result_array() as $result){
			$nameUser = $result['nama'];
		}

		$data = array(
			'nameUser' => $nameUser,
			'page' => 'home',
			'link' => 'home'
		);

		$this->load->view('template/wrapper', $data);
	}
}
