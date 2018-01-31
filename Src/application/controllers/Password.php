<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password extends CI_Controller {
	  
    public function forgot(){
    	extract($_POST);

    	if($inputUsername!=null){
    		$queryUser = $this->Model->ambil("username",md5(strtolower($inputUsername)),"tbl_user")->result_array();
    		if($queryUser == null){
    			$alert = "<script>
						alert('Username/Email tidak terdaftar!!');
						window.location.href='".base_url()."';
						</script>";
				$data = array(
					'alert' => $alert,
					'page' => 'notification',
					'link' => 'home'
				);
				$this->load->view('template/wrapper', $data);
    		}else{
    			$email = null;
    			foreach ($queryUser as $key => $value) {
    				# code...
    				$email = $value['email'];
    			}
    			$this->sendRecoveryEmail($email);
    		}
    	}else if($inputEmail!=null){
    		$queryUserEmail = $this->Model->ambil("email",$inputEmail,"tbl_user")->result_array();
	    	if ($queryUserEmail == null){
				$alert = "<script>
						alert('Username/Email tidak terdaftar!!');
						window.location.href='".base_url()."';
						</script>";
				$data = array(
					'alert' => $alert,
					'page' => 'notification',
					'link' => 'home'
				);
				$this->load->view('template/wrapper', $data);
			}else{
				$email = null;
    			foreach ($queryUserEmail as $key => $value) {
    				# code...
    				$email = $value['email'];
    			}
    			$this->sendRecoveryEmail($email);
			}
    	}
    }

    public function sendRecoveryEmail($toEmail){
    	/* config sendMail
    	$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		*/

		/*$config['protocol'] = 'smtp';
		$config['smtp_host']='ssl://smtp.mailgun.org';
		$config['smtp_user']='postmaster@cpatt.mailgun.org';
		$config['smtp_pass']='youpassword';
		$config['smtp_port']='465';

		$this->email->initialize($config);

    	
    	$this->email->from('your@example.com', 'Admin');
		$this->email->to($toEmail);
		$this->email->subject('[Samsak.id] Password Reset');
		$this->email->message('Testing the email class.');

		$this->email->send();
		*/
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