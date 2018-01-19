<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index(){
		extract ($_POST);

		$queryuser = $this->Model->ambil("username",md5($inputUser),"tbl_user");
		if ($queryuser->result_array() != null){
			$alert = "<script>
					alert('Username telah digunakan !!');
					window.location.href='".base_url()."';
					</script>";
			$data = array(
				'alert' => $alert,
				'page' => 'notification',
				'link' => 'home'
			);
			$this->load->view('template/wrapper', $data);
		}else{

			$config['upload_path']      = './assets/upload/';
			$config['allowed_types']    = 'gif|jpg|png';
			$config['file_name']		= md5($inputUser).'.png';
			$config['overwrite']		= true;
			$config['max_size']         = 2048;
			$config['max_width']        = 1024;
			$config['max_height']       = 768;

			$this->load->library('upload', $config);
			if ( !$this->upload->do_upload('inputFoto'))
			{
				$alert = "<script>
				alert('Gambar tidak valid!!');
				window.location.href='".base_url()."';
				</script>";
				$data = array(
					'alert' => $alert,
					'page' => 'notification',
					'link' => 'home'
				);
				$this->load->view('template/wrapper', $data);
			}
			else
			{
				if ($inputPass == $inputPassConfirm){
				
					$id = $this->getUniqueID()+1;
					$dataInsert = array(
						'id' => $id,
						'nama' => $inputNama,
						'status' => 'non-active',
						'level' => '1',
						'username' => md5($inputUser),
						'password' => md5($inputPass),
						'tempat_lahir' => $inputTempatLahir,
						'tanggal_lahir' => date_format(date_create($inputTanggalLahir),'Y-m-d'),
						'telepon' => $inputTelepon,
						'email' => $inputEmail,
						'alamat' => $inputAlamat,
						'tahun_masuk' => $inputTahun,
						'dojo_pertama' => $inputDojo,
						'kota' => $inputKota,
						'nama_pelatih' => $inputPelatih,
						'foto' => $inputUser.'.png',
					);

					$queryInsert = $this->Model->simpan_data($dataInsert,'tbl_user');

					$alert = "<script>
						alert('Register Sukses !!');
						window.location.href='".base_url()."index.php/Home';
						</script>";
					$data = array(
						'nameUser' => 'Login',
						'alert' => $alert,
						'page' => 'notification',
						'link' => 'home'
					);
					$this->load->view('template/wrapper', $data);
				}else{
					$alert = "<script>
					alert('Password tidak cocok!!');
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

	function getUniqueID(){
    	#fuction to get unique ID for tbl_user
        
        $maxID = $this->Model->maxFrom('id','tbl_user');
        
        return (int) $maxID;
    }

}
