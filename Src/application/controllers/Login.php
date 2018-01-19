<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index(){
		extract ($_POST);

		$queryuser = $this->Model->ambil("username",md5($user),"tbl_user");
		if ($queryuser->result_array() == null){
			$_SESSION['login'] = null;
			$alert = "<script>
					alert('Username salah !!');
					window.location.href='".base_url()."';
					</script>";
			$data = array(
				'alert' => $alert,
				'page' => 'notification',
				'link' => 'home'
			);
			$this->load->view('template/wrapper', $data);
		}else{
			foreach($queryuser->result_array() as $queryuser){
				$username = $queryuser['username'];
				$password = $queryuser['password'];
			}
			if ($password == md5($pass)){
				$alert = "<script>
					alert('Login Sukses !!');
					window.location.href='".base_url()."index.php/Home';
					</script>";
				$_SESSION['login'] = $queryuser['id'];
				$_SESSION['status'] = $queryuser['status'];
				$_SESSION['nama'] = $queryuser['nama'];
				$_SESSION['username'] = $queryuser['username'];
				$_SESSION['level'] = $queryuser['level'];
				$_SESSION['jabatan'] = $queryuser['jabatan'];
				$_SESSION['kode_dojo'] = $queryuser['kode_dojo'];
				$_SESSION['kode_kabupaten_kota'] = $queryuser['kode_kabupaten_kota'];
				$_SESSION['kode_provinsi'] = $queryuser['kode_provinsi'];
				$_SESSION['kode_negara'] = $queryuser['kode_negara'];
				$infoDojo = $this->Model->ambil("kode_dojo",$_SESSION['kode_dojo'],"tbl_dojo")->result_array();
				if($infoDojo != null){
					foreach ($infoDojo as $key => $value) {
						$_SESSION['nama_dojo'] = $value['nama_dojo'];
					}
				}
				$data = array(
					'nameUser' => 'Login',
					'alert' => $alert,
					'page' => 'notification',
					'link' => 'home'
				);
				$this->load->view('template/wrapper', $data);
			}else{
				$_SESSION['login'] = null;
				$alert = "<script>
				alert('Password Salah !!');
				window.location.href='".base_url()."';
				</script>";
				$data = array(
					'alert' => $alert,
					'page' => 'notification',
					'link' => 'home'
				);
				$this->load->view('template/wrapper', $data);
			}
		}
	}
}
