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
    			$username = $inputUsername;
    			foreach ($queryUser as $key => $value) {
    				# code...
    				$email = $value['email'];
    			}
    			$this->sendRecoveryEmail($email,$username,$this->randomPassword());
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
				$username = null;
    			foreach ($queryUserEmail as $key => $value) {
    				# code...
    				$email = $value['email'];
    				$username = $value['email'];
    			}
    			$this->sendRecoveryEmail($email,$username,$this->randomPassword());
			}
    	}else{
    		$alert = "<script>
						alert('Username/Email tidak valid!!');
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

    public function sendRecoveryEmail($toEmail,$username,$newPass){
    	$config = array(
		    'protocol' => 'smtp',
		    'smtp_host' => 'mx1.hostinger.co.id',
		    'smtp_port' => 587,
		    'smtp_user' => 'xxxx@xxx.com',
		    'smtp_pass' => 'xxx',
		    'mailtype'  => 'html', 
		    'charset'   => 'iso-8859-1'
		);
		
		$this->load->library('email', $config);
		$this->email->set_newline('\r\n');

    	$this->email->from('support@bkcbdg.com', 'SUPPORT SAMSAK');
		$listEmail = array($toEmail);
        $this->email->to($listEmail);
        $this->email->subject('[SAMSAK] Password Reset');
		$this->email->message('Please do not reply to this email. This email is used only to help you remember your account. This is the detail of your account:

Username :'.$username.'
Password :'.$newPass);
        $alert = "";
        if ($this->email->send()) {
        	$dataUpdate = array(
        		'username' => md5($username),
				'password' => md5($newPass)
			);

			$queryUpdate = $this->Model->update("email",$toEmail,"tbl_user",$dataUpdate);
            $alert = "<script>
			alert('Please check your e-mail to get your new password !!');
			window.location.href='".base_url()."';
			</script>";
        } else {
            show_error($this->email->print_debugger());
        }
		
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

    public function randomPassword() {
	    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	    $pass = array(); //remember to declare $pass as an array
	    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	    for ($i = 0; $i < 8; $i++) {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
	    }
	    return implode($pass); //turn the array into a string
	}
	
}