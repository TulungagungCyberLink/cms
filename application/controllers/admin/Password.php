<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('role') != 'admin'){
			redirect('admin/login');
		}
		$this->load->model('m_data');
	}

	public function index(){
		$this->load->library('form_validation');
		if($this->form_validation->run('ADM.change_password') == FALSE){
			$this->load->view('admin/password');
		}
		else{
			$data = array(
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
			);
			$where = array(
				'username' => $this->session->userdata('username')
			);

			if($this->m_data->update($where, $data, 'user') != 0){
				$this->session->set_flashdata('success', 'Password berhasil di perbarui');
			}
			else{
				$this->session->set_flashdata('error', 'Password gagal di perbarui');
			}
			redirect('admin');
		}
	}
}
