<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Whatsapp Gateway - Home';
		$data['content'] = 'pages/home';
		$this->load->view('layout/wrapper', $data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */