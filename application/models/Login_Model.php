<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Model extends CI_Model {

	public function is_logged_in($user_id)
	{
		$this->db->where('user_id', $user_id);
		$result = $this->db->get('login')->row();
		return $result;
		
		// if ($result > 0) {
		// 	$res = json_output(200, $check);
		// 	return $res;
		// } else {
		// 	$res = json_output(401, 'Unauthorized Access!');
		// 	return $res;
		// }
	}

}

/* End of file Login_Model.php */
/* Location: ./application/models/Login_Model.php */