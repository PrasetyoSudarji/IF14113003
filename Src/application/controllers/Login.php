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
				'infoDojo' => null,
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
				$_SESSION['level'] = $queryuser['level'];
				$data = array(
					'infoDojo' => null,
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
					'infoDojo' => null,
					'alert' => $alert,
					'page' => 'notification',
					'link' => 'home'
				);
				$this->load->view('template/wrapper', $data);
			}
		}
	}
}
