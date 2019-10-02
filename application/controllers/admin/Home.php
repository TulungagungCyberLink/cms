<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('role') != 'admin'){
			redirect('admin/login');
		}
		$this->load->model('m_data');
	}

	public function index(){
		$data = array('msg' => $this->m_data->config('welcome'));
		$this->load->view('admin/dashboard.php', $data);
	}

	public function change_welcome(){
		$this->load->library('form_validation');
		if($this->form_validation->run('ADM.update_welcome')){
			$this->m_data->config('welcome', $this->input->post('welcome'));
			redirect('admin');
		}
		else{
			show_404();
		}
	}
	
}
