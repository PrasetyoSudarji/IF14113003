<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$infoDojo = null;
		$nameUser = null;
		if($_SESSION['login']!=null){
			$query = $this->Model->ambil("id",$_SESSION['login'],"tbl_user");
			foreach($query->result_array() as $result){
				$nameUser = $result['nama'];
				if($result['kode_dojo'] != null){
					$infoDojo = $this->Model->ambil("kode_dojo",$result['kode_dojo'],"tbl_dojo")->result_array();
				}
			}
		}
		
		$data = array(
			'infoDojo' => $infoDojo,
			'nameUser' => $nameUser,
			'page' => 'home',
			'link' => 'home'
		);

		$this->load->view('template/wrapper', $data);
	}
}
