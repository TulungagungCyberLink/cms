<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_data');
	}

	public function index(){
		$this->load->library('form_validation');
		if($this->form_validation->run('login') == FALSE){
			$this->load->view('admin/login');
		}
		else{
			$where = array(
				'username' => $this->input->post('username')
			);
			$user = $this->m_data->get_where($where, 'user')->row();
			if(!empty($user)){
				if(password_verify($this->input->post('password'), $user->password)){
					$data = array(
						'username' => $user->username,
						'role' => $user->role
					);
					$this->session->set_userdata($data);
					redirect('admin');
				}
				else{
					$this->session->set_flashdata('error', 'Kata sandi salah!');
					redirect('admin/login');
				}
			}
			else{
				$this->session->set_flashdata('error', 'Akun tidak ada!');
				redirect('admin/login');
			}
		}
	}
}
