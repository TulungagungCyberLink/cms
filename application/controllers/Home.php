<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_data');
	}

	public function index(){
		$data['slider'] = $this->m_data->get_slider()->result();
		$data['member'] = $this->m_data->get_member()->result();
		$this->load->view('home', $data);
	}

	public function photo($file=''){
		if(strstr($file, '../')){
			die('Apakah ini LFI?');
		}
		$file = './uploads/'.$file;
		if(file_exists($file)){
			if(substr(mime_content_type($file), 0, 5) == 'image'){
				$this->output
					->set_content_type('img')
					->set_output(file_get_contents($file))
					->_display();
			}
			else{
				$this->output
					->set_content_type('img')
					->set_output(file_get_contents('./assets/images/anonymous.png'))
					->_display();
			}
			exit();
		}
		else{
			show_404();
		}
	}

	public function send(){
		$result = array(
			'status' => false,
			'id' => 0
		);
		if($this->input->is_ajax_request()){
			$this->load->library('form_validation');
			if($this->form_validation->run('send_msg') == TRUE){
				$data = array(
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'subject' => $this->input->post('subject'),
					'message' => $this->input->post('message')
				);
				$result['status'] = true;
				$result['id'] = $this->m_data->insert($data, 'message');
				echo json_encode($result);
			}
			else{
				echo json_encode($result);
			}
		}
		else{
			show_404();
		}
	}
}
