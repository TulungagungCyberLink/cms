<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Token extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('role') != 'admin'){
			redirect('admin/login');
		}
		$this->load->model('m_data');
	}

	public function index(){
		$data = array(
			'token' => $this->m_data->config('token')
		);
		if(empty($data['token'])){
			$this->session->set_flashdata('error', 'Konfigurasi database hilang.');
			redirect('admin/home');
		}
		else{
			$this->load->view('admin/token', $data);
		}
	}

	public function generate($len = 6){
		$this->m_data->config('token', get_token($len));
		redirect('admin/token');
	}
}