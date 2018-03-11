<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	  
    public function index(){
    	if(!$this->session->has_userdata('login')){
            $alert = "<script>
                    alert('Access ditolak !!');
                    window.location.href='".base_url()."';
                    </script>";
            $data = array(
                'alert' => $alert,
                'page' => 'notification',
                'link' => 'home'
            );  
        
            $this->load->view('template/wrapper', $data);
        }else{
			$listTingkatan = array('KYU VII',
									'KYU VI',
            						'KYU V',
            						'KYU IV',
            						'KYU III',
            						'KYU II',
            						'KYU I',
            						'DAN I',
            						'DAN II',
            						'DAN III',
            						'DAN IV',
            						'DAN V',
            						'DAN VI',
            						'DAN VII');
			$infoUser = $this->Model->ambil('id',$_SESSION['login'],'tbl_user')->result_array();

			$data = array(
				'infoUser' => $infoUser,
				'listTingkatan' => $listTingkatan,
				'page' => 'profile',
				'link' => 'profile'
			);
			$this->load->view('template/wrapper', $data);
		}
    }

    public function edit(){
    	if(!$this->session->has_userdata('login')){
            $alert = "<script>
                    alert('Access ditolak !!');
                    window.location.href='".base_url()."';
                    </script>";
            $data = array(
                'alert' => $alert,
                'page' => 'notification',
                'link' => 'home'
            );  
        
            $this->load->view('template/wrapper', $data);
        }else{
        	extract($_POST);
        	$queryUserEmail = $this->Model->ambil("email",$inputEmail,"tbl_user");
        	if ($queryUserEmail->result_array() != null){
				$alert = "<script>
						alert('Email telah digunakan !!');
						window.location.href='".base_url()."';
						</script>";
				$data = array(
					'alert' => $alert,
					'page' => 'notification',
					'link' => 'home'
				);
				$this->load->view('template/wrapper', $data);
			}else{
				$dataUpdate = array(
		            'nama' => $inputNama,
		            'tingkatan' => $inputTingkatan,
		            'tempat_lahir' => $inputTempatLahir,
		            'tanggal_lahir' => date_format(date_create($inputTanggalLahir),'Y-m-d'),
		            'telepon' => $inputTelepon,
		            'email' => $inputEmail,
		            'alamat' => $inputAlamat,
		            'tahun_masuk' => $inputTahunMasuk,
		            'dojo_pertama' => $inputDojoPertama,
		            'kota' => $inputKota,
		            'nama_pelatih' => $inputNamaPelatih
		         );

		        $queryUpdate = $this->Model->update("id",$_SESSION['login'],"tbl_user",$dataUpdate);

				$alert = "<script>
	                    alert('Update profile success !!');
	                    window.location.href='".base_url()."index.php/profile';
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

    public function changeFoto(){
    	if(!$this->session->has_userdata('login')){
            $alert = "<script>
                    alert('Access ditolak !!');
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
			$config['file_name']		= $_SESSION['username'].'.png';
			$config['overwrite']		= true;
			$config['max_size']         = 2048;

			$dataUpdate = array(
	            'foto' => $_SESSION['username'].'.png'
	         );

	        $queryUpdate = $this->Model->update("id",$_SESSION['login'],"tbl_user",$dataUpdate);

			$this->load->library('upload', $config);
			if ( !$this->upload->do_upload('inputFoto'))
			{
				$alert = "<script>
				alert('Gambar tidak valid!!');
				window.location.href='".base_url()."index.php/profile';
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
				$alert = "<script>
					alert('Foto berhasil diganti!!');
					window.location.href='".base_url()."index.php/profile';
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