<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Token extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_data');
	}

	public function check($token = null){
		if(is_null($token)){
			$data = $this->m_data->get_token()->row();
			$result = array(
				'status' => false,
				'token' => $token
			);
			if(!empty($data)){
				if($data->value_config === $token){
					$result['status'] = true;
					$this->m_data->update_token();
				}
			}

			$this->output->set_content_type('application/json')->set_output(json_encode($result));
		}
	}
}
