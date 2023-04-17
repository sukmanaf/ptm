<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('GlobalModel','global');
	}


	public function index()
	{
		$this->load->view('login/login',null, FALSE);
	}

	public function action($value='')
	{
		$post	= [
						'user' => $this->input->post('user_id',true),
						'pass' => $this->input->post('password',true)
					];
		
		$check = $this->global->login($post);
		if (!empty($check)) {
		 	$pass =  str_replace(' ','',hash('sha256', $post['pass']));
		 	$passCheck =  str_replace(' ','',$check['password']);
			if ($passCheck == $pass) {
				// echo 'sukses';
				unset($check['password']);
				$sess['login'] = $check; 
				$this->session->set_userdata($sess);
				echo  json_encode(['sts'=>'success','message' => 'Login Berhasil!']);
			}else{
				echo  json_encode(['sts'=>'fail','message' => 'Password Salah!']);
			}
			
		}else{
				echo  json_encode(['sts'=>'fail','message' => 'Username Salah!']);
		}

		// echo "<pre>";
		// print_r ($this->session->userdata('login'));
		// echo "</pre>";
	}

	public function logout()
	{
		$this->session->unset_userdata('login');
		redirect(base_url('login'),'refresh');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */