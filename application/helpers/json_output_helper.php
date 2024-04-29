<?php
defined('BASEPATH') OR exit('No direct script access allowed');


	function json_output($statusHeader,$response)
	{
		$split_status = str_split($statusHeader);
		$is_error = ($split_status[0] === 2) ? TRUE : FALSE ;
		$ci =& get_instance();
		$ci->output->set_content_type('application/json');
		$ci->output->set_status_header($statusHeader);
		$setJson = [
			"http_code" => $statusHeader,
			"is_error" => $is_error,
			"response" => $response
		];
		$ci->output->set_output(json_encode($setJson));
	}
