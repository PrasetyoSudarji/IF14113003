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
        	$data = array(
				'page' => 'change_password',
				'link' => 'change_password'
			);

			$this->load->view('template/wrapper', $data);
		}
    }

    public function prosesChange(){

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
			
			$infoUser = $this->Model->ambil('id',$_SESSION['login'],'tbl_user')->result_array();
			foreach ($infoUser as $key => $value) {
				# code...
				if(md5($inputOldPassword) != $value['password']){
					$alert = "<script>
		                    alert('Wrong Password !!');
		                    window.location.href='".base_url()."index.php/password/change';
		                    </script>";
		            $data = array(
		                'alert' => $alert,
		                'page' => 'notification',
		                'link' => 'home'
		            );  
		        
		            $this->load->view('template/wrapper', $data);
				}else{
					if($inputNewPassword != $inputConfirmNewPassword){
						$alert = "<script>
		                    alert('Password does not match!!');
		                    window.location.href='".base_url()."index.php/password/change';
		                    </script>";
			            $data = array(
			                'alert' => $alert,
			                'page' => 'notification',
			                'link' => 'home'
			            );  
			        
			            $this->load->view('template/wrapper', $data);
					}else{
						$dataUpdate = array(
							'password' => md5($inputNewPassword)
						);

						$queryUpdate = $this->Model->update("id",$_SESSION['login'],"tbl_user",$dataUpdate);
						$alert = "<script>
		                    alert('Change Password Success !!');
		                    window.location.href='".base_url()."index.php/password/change';
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
    }
	
}