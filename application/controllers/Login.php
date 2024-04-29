<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}

	public function index()
	{
		$this->load->view('pages/login');
	}

	public function is_logged_in($user_id)
	{
		$check = $this->Login_model->is_logged_in($user_id);
		if ($check > 0) {
			$res = json_output(200, $check);
			return $res;
		} else {
			$res = json_output(401, 'Unauthorized Access!');
			return $res;
		}
		
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */